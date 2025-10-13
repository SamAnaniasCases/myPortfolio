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