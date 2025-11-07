const resumeTabs = document.querySelector(".resume-tabs");
const resumePortfolioTabBtns = resumeTabs.querySelectorAll(".tab-btn");
const resumeTabContents = document.querySelectorAll(".resume-tab-content");

var resumeTabNav = function(resumeTabClick){
    resumeTabContents.forEach((resumeTabContent) => {
        resumeTabContent.style.display = "none";
        resumeTabContent.classList.remove("active");
    });

    resumePortfolioTabBtns.forEach((resumePortfolioTabBtn) => {
        resumePortfolioTabBtn.classList.remove("active");
    });

    resumeTabContents[resumeTabClick].style.display = "flex";
    resumeTabContents[resumeTabClick].classList.add("active");
    resumePortfolioTabBtns[resumeTabClick].classList.add("active");
}

resumePortfolioTabBtns.forEach((resumePortfolioTabBtn, i) =>{
    resumePortfolioTabBtn.addEventListener("click", () =>{
        resumeTabNav(i);
    });
});

/* Resume pop-up */
  const openResume = document.getElementById("openResume");
  const resumeModal = document.getElementById("resumeModal");
  const closeResume = document.querySelector(".close-resume");

  openResume.addEventListener("click", (e) => {
    e.preventDefault();
    resumeModal.style.display = "block";
    document.body.style.overflow = "hidden"; // disable scroll
  });

  closeResume.addEventListener("click", () => {
    resumeModal.style.display = "none";
    document.body.style.overflow = "auto"; // re-enable scroll
  });

  window.addEventListener("click", (e) => {
    if (e.target === resumeModal) {
      resumeModal.style.display = "none";
      document.body.style.overflow = "auto";
    }
  });