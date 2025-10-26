<?php
require_once __DIR__ . '/../model/Project.php';

$project = new Project();

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'create':
        create($project);
        break;
    case 'update':
        update($project);
        break;
    case 'delete':
        delete($project);
        break;
    case 'show':
        show($project);
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Unknown action']);
        exit;
}

// --- CRUD FUNCTIONS ---

function create($project)
{
    // Handle image upload
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . '/../../uploads/';
        if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);
        $fileName = basename($_FILES['image']['name']);
        $filePath = $targetDir . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
        $image = 'uploads/' . $fileName;
    }

    $data = [
        'category'    => $_POST['category'] ?? 'Uncategorized',
        'title'       => $_POST['title'] ?? 'Untitled',
        'description' => $_POST['description'] ?? '',
        'image'       => $image
    ];

    $project->create($data);

    if (!empty($_SERVER['HTTP_REFERER'])) {
        $ref = str_replace(["\r", "\n"], '', $_SERVER['HTTP_REFERER']);
        header('Location: ' . $ref);
    } else {
        header('Location: ../../website/index.php');
    }
    exit;
}

function update($project)
{
    header('Content-Type: application/json');

    $id = $_POST['id'] ?? null;
    if (!$id) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    $image = $_POST['existing_image'] ?? '';

    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . '/../../uploads/';
        if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);
        $fileName = basename($_FILES['image']['name']);
        $filePath = $targetDir . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
        $image = 'uploads/' . $fileName;
    }

    $data = [
        'id'          => $id,
        'category'    => $_POST['category'] ?? 'Uncategorized',
        'title'       => $_POST['title'] ?? 'Untitled',
        'description' => $_POST['description'] ?? '',
        'image'       => $image
    ];

    $project->update($data);
    echo json_encode(['success' => true]);
    exit;
}

/*
function delete($project)
{
    header('Content-Type: application/json');

    $id = $_POST['id'] ?? null;
    if (!$id) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    $project->delete($id);
    echo json_encode(['success' => true]);
    exit;
}
*/

function delete($project)
{
    header('Content-Type: application/json');

    // Check if ID was sent
    if (empty($_POST['id'])) {
        echo json_encode(['success' => false, 'error' => 'No project ID received']);
        exit;
    }

    $id = $_POST['id'];

    try {
        // Call delete function from Project model
        $result = $project->delete($id);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Project::delete() returned false']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

    exit;
}



function show($project)
{
    header('Content-Type: application/json');

    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    echo json_encode(['data' => $project->show($id)]);
    exit;
}
?>
