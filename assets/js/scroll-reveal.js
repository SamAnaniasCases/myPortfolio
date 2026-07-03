/**
 * Premium Scroll-Based Reveal Animations System
 * Uses Intersection Observer for high performance and smooth FPS.
 */

// Enable animation states only if Intersection Observer is supported (Fallback-safe)
if ('IntersectionObserver' in window) {
    document.documentElement.classList.add('js-reveal-active');
}

document.addEventListener("DOMContentLoaded", () => {
    // Check if IntersectionObserver is available
    if (!('IntersectionObserver' in window)) return;

    // Configuration for scroll reveal threshold and margin
    const revealOptions = {
        root: null, // relative to the viewport
        rootMargin: "0px 0px -50px 0px", // triggers 50px before entering viewport for anticipation
        threshold: 0.1 // triggers when at least 10% of the element is visible
    };

    // Helper to clean up reveal classes after transition finishes (prevents hover/layout overrides)
    const setupSelfCleaning = (target) => {
        const cleanup = (e) => {
            if (e.target === target) {
                target.classList.remove(
                    'reveal-fade', 'reveal-up', 'reveal-down', 
                    'reveal-left', 'reveal-right', 'reveal-scale', 
                    'revealed', 'reveal-delay-1', 'reveal-delay-2', 
                    'reveal-delay-3', 'reveal-delay-4', 'reveal-delay-5', 
                    'reveal-delay-6', 'reveal-delay-7', 'reveal-delay-8',
                    'reveal-onload'
                );
                target.removeAttribute('data-delay');
                target.removeEventListener('transitionend', cleanup);
                target.removeEventListener('transitioncancel', cleanup);
            }
        };
        target.addEventListener('transitionend', cleanup);
        target.addEventListener('transitioncancel', cleanup);
    };

    // Instantiate IntersectionObserver
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                
                // Set up self cleaning before triggering transition
                setupSelfCleaning(target);
                
                // Add the revealed class to trigger CSS transition
                target.classList.add('revealed');
                
                // Unobserve immediately after reveal to optimize scroll performance and avoid redundant processing
                observer.unobserve(target);
            }
        });
    }, revealOptions);

    // Select all elements marked for scroll-based reveals (excluding immediate load reveals)
    const scrollRevealTargets = document.querySelectorAll(`
        .reveal-fade:not(.reveal-onload),
        .reveal-up:not(.reveal-onload),
        .reveal-down:not(.reveal-onload),
        .reveal-left:not(.reveal-onload),
        .reveal-right:not(.reveal-onload),
        .reveal-scale:not(.reveal-onload)
    `);

    // Register scroll targets with observer
    scrollRevealTargets.forEach(target => {
        revealObserver.observe(target);
    });

    // Handle immediate entrance reveals for elements above the fold on page load
    const loadRevealTargets = document.querySelectorAll('.reveal-onload');
    if (loadRevealTargets.length > 0) {
        // Small delay (100ms) to ensure layout and rendering tree are complete
        setTimeout(() => {
            loadRevealTargets.forEach(target => {
                setupSelfCleaning(target);
                target.classList.add('revealed');
            });
        }, 100);
    }
});
