const resumeTabs = document.querySelector(".resume-tabs");
const resumePortfolioTabBtns = resumeTabs.querySelectorAll(".tab-btn");
const resumeTabContents = document.querySelectorAll(".resume-tab-content");
const resumeModalContent = document.querySelector(".resume-modal-content");

let isTransitioning = false;

var resumeTabNav = function(resumeTabClick){
    const activeContent = document.querySelector(".resume-tab-content.active");
    const targetContent = resumeTabContents[resumeTabClick];

    // If clicking the already active tab, or transitioning, do nothing
    if (activeContent === targetContent || isTransitioning) return;

    isTransitioning = true;

    // 1. Update tab button state immediately for responsiveness
    resumePortfolioTabBtns.forEach((btn) => btn.classList.remove("active"));
    resumePortfolioTabBtns[resumeTabClick].classList.add("active");

    // Check if prefers-reduced-motion is active
    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (prefersReducedMotion) {
        // Instant swap for accessibility
        if (activeContent) {
            activeContent.classList.remove("active");
            activeContent.style.display = "none";
        }
        targetContent.style.display = "flex";
        targetContent.classList.add("active");
        isTransitioning = false;
        return;
    }

    // 2. Measure current container height of .resume-modal-content
    const initialHeight = resumeModalContent.offsetHeight;

    // 3. Fade out outgoing content
    if (activeContent) {
        activeContent.classList.add("fading-out");
        
        // Wait for fade out transition (150ms matches CSS transition)
        setTimeout(() => {
            activeContent.style.display = "none";
            activeContent.classList.remove("active", "fading-out");

            // 4. Prepare incoming content (display flex but opacity 0 initially)
            targetContent.style.display = "flex";
            // Trigger layout reflow
            targetContent.offsetHeight; 

            // 5. Measure new container height
            const targetHeight = resumeModalContent.offsetHeight;

            // 6. Set container to initial height and force reflow
            resumeModalContent.style.height = initialHeight + "px";
            resumeModalContent.style.overflow = "hidden"; // Prevent content spill during transition
            resumeModalContent.offsetHeight; // force repaint

            // 7. Transition container height and fade in new content
            resumeModalContent.style.height = targetHeight + "px";
            targetContent.classList.add("active");

            // 8. Wait for transitions to complete (350ms matches CSS transition)
            setTimeout(() => {
                resumeModalContent.style.height = "";
                resumeModalContent.style.overflow = "";
                isTransitioning = false;
            }, 350);

        }, 150);
    } else {
        // Fallback if no active content exists (should not happen)
        targetContent.style.display = "flex";
        targetContent.classList.add("active");
        isTransitioning = false;
    }
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
    resumeModal.classList.add("open");
    document.body.style.overflow = "hidden"; // disable scroll
});

const closeResumeModal = () => {
    resumeModal.classList.remove("open");
    document.body.style.overflow = "auto"; // re-enable scroll
    
    // Reset heights and transition locks on close after transition ends
    setTimeout(() => {
        resumeModalContent.style.height = "";
        resumeModalContent.style.overflow = "";
        isTransitioning = false;
    }, 400);
};

closeResume.addEventListener("click", closeResumeModal);

window.addEventListener("click", (e) => {
    if (e.target === resumeModal) {
        closeResumeModal();
    }
});