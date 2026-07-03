<?php

namespace App\Controllers;

use App\Models\Project;
use App\Middleware\AuthMiddleware;

class ProjectController
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new Project();
    }

    /**
     * Route and handle incoming REST actions.
     */
    public function handle()
    {
        // Enforce session check for admin CRUD operations
        AuthMiddleware::checkApi();

        $action = $_GET['action'] ?? null;
        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'show':
                $this->show();
                break;
            default:
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Unknown action']);
                exit();
        }
    }

    /**
     * Create a project record and handle screenshot uploads.
     */
    private function create()
    {
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $targetDir = __DIR__ . '/../../uploads/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Secure file upload validation
            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $allowedExtensions)) {
                $_SESSION['flash_error'] = 'Invalid file extension. Only JPG, PNG, and WEBP allowed.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            // Clean, non-colliding name mapping
            $fileName = uniqid('proj_', true) . '.' . $extension;
            $filePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                $image = 'uploads/' . $fileName;
            }
        }

        $data = [
            'category'    => $_POST['category'] ?? 'Uncategorized',
            'title'       => $_POST['title'] ?? 'Untitled',
            'description' => $_POST['description'] ?? '',
            'image'       => $image
        ];

        $this->projectModel->create($data);

        // Redirect back to referring page or dashboard
        if (!empty($_SERVER['HTTP_REFERER'])) {
            $ref = str_replace(["\r", "\n"], '', $_SERVER['HTTP_REFERER']);
            header('Location: ' . $ref);
        } else {
            header('Location: ' . BASE_URL . 'admin.php');
        }
        exit();
    }

    /**
     * Update an existing project record and clean up obsolete screenshots.
     */
    private function update()
    {
        header('Content-Type: application/json');

        $id = $_POST['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing project ID']);
            exit();
        }

        $image = $_POST['existing_image'] ?? '';

        if (!empty($_FILES['image']['name'])) {
            $targetDir = __DIR__ . '/../../uploads/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $allowedExtensions)) {
                echo json_encode(['error' => 'Invalid file extension. Only JPG, PNG, and WEBP allowed.']);
                exit();
            }

            $fileName = uniqid('proj_', true) . '.' . $extension;
            $filePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                // Clean up obsolete image file from disk
                if (!empty($image)) {
                    $oldImagePath = __DIR__ . '/../../' . $image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $image = 'uploads/' . $fileName;
            }
        }

        $data = [
            'id'          => $id,
            'category'    => $_POST['category'] ?? 'Uncategorized',
            'title'       => $_POST['title'] ?? 'Untitled',
            'description' => $_POST['description'] ?? '',
            'image'       => $image
        ];

        $this->projectModel->update($data);
        echo json_encode(['success' => true]);
        exit();
    }

    /**
     * Delete a project record and its associated screenshot image.
     */
    private function delete()
    {
        header('Content-Type: application/json');

        if (empty($_POST['id'])) {
            echo json_encode(['success' => false, 'error' => 'No project ID received']);
            exit();
        }

        $id = $_POST['id'];

        try {
            $item = $this->projectModel->show($id);
            if (!$item) {
                echo json_encode(['success' => false, 'error' => 'Project not found']);
                exit();
            }

            // Remove image from uploads folder
            if (!empty($item['image'])) {
                $imagePath = __DIR__ . '/../../' . $item['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $result = $this->projectModel->delete($id);
            echo json_encode(['success' => (bool)$result]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
        exit();
    }

    /**
     * Fetch a project record returned as JSON data.
     */
    private function show()
    {
        header('Content-Type: application/json');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing project ID']);
            exit();
        }

        echo json_encode(['data' => $this->projectModel->show($id)]);
        exit();
    }
}
