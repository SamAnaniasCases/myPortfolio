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


// Open close
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


// ADD PROJECTS OPEN AND CLOSE
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


// EDIT PROJECTS
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

    // Show the modal
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

    // Fill the form fields
    editForm.querySelector("#editId").value = id;
    editForm.querySelector("#editCategory").value = category;
    editForm.querySelector("#editTitle").value = title;
    editForm.querySelector("#editDescription").value = description;
    editForm.querySelector("#editExistingImage").value = image;

    // Show the modal
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


