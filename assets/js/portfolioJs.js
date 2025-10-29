// ===== Category filter =====
document.addEventListener("DOMContentLoaded", () => {
    const portfolioTabs = document.querySelector(".portfolio-tabs");
    const portfolioTabBtns = portfolioTabs.querySelectorAll(".tab-btn");
    const cardsWithModals = document.querySelectorAll(".portfolio-container .card-with-modal");

    portfolioTabBtns.forEach((tabBtn) => {
        tabBtn.addEventListener("click", () =>{
            const filter = tabBtn.getAttribute("data-filter");

            cardsWithModals.forEach((cardWithModal) => {
                if(filter === "all" || cardWithModal.classList.contains(filter)){
                    
                    cardWithModal.classList.remove("hidden");
                    setTimeout(() =>{
                        cardWithModal.style.opacity = "1";
                        cardWithModal.style.transition = "0.5s ease";
                    }, 1);

                }
                else{
                    cardWithModal.classList.add("hidden");

                    setTimeout(() =>{
                        cardWithModal.style.opacity = "0";
                        cardWithModal.style.transition = "0.5s ease";
                    }, 1);
                }
            });
            portfolioTabBtns.forEach((tabBtn) => tabBtn.classList.remove("active"));
            tabBtn.classList.add("active");
        });
    });

});


// ===== Open close in modal =====
const portfolioCardsWithModals = document.querySelectorAll(".portfolio-container .card-with-modal");

portfolioCardsWithModals.forEach((portfolioCardWithModal) => {
    const portfolioCard = portfolioCardWithModal.querySelector(".portfolio-card");
    const portfolioBackdrop = portfolioCardWithModal.querySelector(".portfolio-modal-backdrop");
    const portfolioModal = portfolioCardWithModal.querySelector(".portfolio-modal");
    const modalCloseBtn = portfolioCardWithModal.querySelector(".modal-close-btn");

    portfolioCard.addEventListener("click", () => {
        portfolioBackdrop.style.display = "flex";

        setTimeout(() => {
        portfolioBackdrop.classList.add("active");
        }, 300);

        setTimeout(() => {
        portfolioModal.classList.add("active");

        }, 300);
    });

    modalCloseBtn.addEventListener("click", () =>{

        setTimeout(() => {
        portfolioBackdrop.style.display = "none";
        
        }, 500);

        setTimeout(() => {
        portfolioBackdrop.classList.remove("active");
        portfolioModal.classList.remove("active");

        }, 100);
    });

});


// ===== ADD PROJECTS OPEN AND CLOSE =====
const addProjectBtn = document.getElementById("addProjectBtn");
const addProjectBackdrop = document.getElementById("addProjectModal");
const addProjectModal = addProjectBackdrop.querySelector(".portfolio-modal");
const closeAddModalBtn = document.getElementById("closeAddModal");

addProjectBtn.addEventListener("click", () => {
    addProjectBackdrop.style.display = "flex";

    setTimeout(() => {
        addProjectBackdrop.classList.add("active");
    }, 300);

    setTimeout(() => {
        addProjectModal.classList.add("active");
    }, 300);
});

closeAddModalBtn.addEventListener("click", () => {
    setTimeout(() => {
        addProjectBackdrop.style.display = "none";
    }, 500);

    setTimeout(() => {
        addProjectBackdrop.classList.remove("active");
        addProjectModal.classList.remove("active");
    }, 100);
});

// click outside modal to close
addProjectBackdrop.addEventListener("click", (e) => {
    if (e.target === addProjectBackdrop) {
        setTimeout(() => {
            addProjectBackdrop.style.display = "none";
        }, 500);

        setTimeout(() => {
            addProjectBackdrop.classList.remove("active");
            addProjectModal.classList.remove("active");
        }, 100);
    }
});


// ===== EDIT PROJECTS =====
document.querySelectorAll(".edit-btn").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.stopPropagation();

    const id = btn.dataset.id;
    const title = btn.dataset.title;
    const category = btn.dataset.category;
    const description = btn.dataset.description;
    const image = btn.dataset.image;

    const editModal = document.getElementById("editProjectModal");
    const editForm = document.getElementById("editProjectForm");

    editForm.querySelector("#editId").value = id;
    editForm.querySelector("#editCategory").value = category;
    editForm.querySelector("#editTitle").value = title;
    editForm.querySelector("#editDescription").value = description;
    editForm.querySelector("#editExistingImage").value = image;

    editModal.style.display = "flex";
    setTimeout(() => editModal.classList.add("active"), 10);
  });
});

document.querySelectorAll(".edit-btn").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.stopPropagation();

    const id = btn.dataset.id;
    const title = btn.dataset.title;
    const category = btn.dataset.category;
    const description = btn.dataset.description;
    const image = btn.dataset.image;

    const editModal = document.getElementById("editProjectModal");
    const editForm = document.getElementById("editProjectForm");

    editForm.querySelector("#editId").value = id;
    editForm.querySelector("#editCategory").value = category;
    editForm.querySelector("#editTitle").value = title;
    editForm.querySelector("#editDescription").value = description;
    editForm.querySelector("#editExistingImage").value = image;

    editModal.style.display = "flex";
    setTimeout(() => editModal.classList.add("active"), 10);
  });
});

// Close modal on close button
document.getElementById("closeEditModal").addEventListener("click", () => {
  const editModal = document.getElementById("editProjectModal");
  editModal.classList.remove("active");
  setTimeout(() => (editModal.style.display = "none"), 300);
});


document.getElementById("editProjectForm").addEventListener("submit", async (e) => {
  e.preventDefault(); 

  const form = e.target;
  const formData = new FormData(form);

  try {

    const response = await fetch(form.action, {
      method: "POST",
      body: formData,
    });

    const result = await response.json();

    if (result.success) {
      alert("✅ Project updated successfully!");

      const modal = document.getElementById("editProjectModal");
      modal.classList.remove("active");
      setTimeout(() => (modal.style.display = "none"), 300);

      const id = formData.get("id");
      const title = formData.get("title");
      const category = formData.get("category");
      const description = formData.get("description");

      const card = document.querySelector(`.edit-btn[data-id="${id}"]`)?.closest(".card-with-modal");
      if (card) {
        card.querySelector("h4").textContent = title;
        card.querySelector("span").textContent = category;
        card.querySelector(".description").textContent = description;
      }

    } else {
      alert("❌ Update failed — please try again.");
      console.error(result);
    }
  } catch (error) {
    console.error("Error during update:", error);
    alert("⚠️ Something went wrong. Check console for details.");
  }
});


// ===== Delete =====
document.querySelectorAll(".delete-btn").forEach((btn) => {
  btn.addEventListener("click", async (e) => {
    e.stopPropagation();
    const id = btn.dataset.id;
    const confirmed = confirm("⚠️ Are you sure you want to delete this project?");

    if (!confirmed) return;

    try {
      const response = await fetch(`${BASE_URL}admin/controller/projectController.php?action=delete`, {

          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: new URLSearchParams({ id }),
        }
      );

      const result = await response.json();
      console.log("Server response:", result);


      if (result.success) {
        alert("✅ Project deleted successfully!");

        const card = btn.closest(".card-with-modal");
        if (card) {
          card.style.transition = "opacity 0.3s ease";
          card.style.opacity = "0";
          setTimeout(() => card.remove(), 300);
        }

      } else {
        alert("❌ Deletion failed. Please try again.");
      }
    } catch (error) {
      console.error("Error deleting project:", error);
      alert("⚠️ Something went wrong while deleting.");
    }
  });
});



