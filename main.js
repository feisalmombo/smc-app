document.addEventListener('DOMContentLoaded', function() {
    const scrollWrapper = document.querySelector('.scroll-wrapper');
    const scrollContainer = document.querySelector('.scrolling-images');

    let scrollAmount = 0;
    const scrollDuration = 60000;
    const scrollWidth = scrollWrapper.scrollWidth - scrollContainer.clientWidth; // Total scrollable width

    function animateScroll() {
        const startTime = performance.now();

        function scroll() {
            const elapsed = performance.now() - startTime;
            const progress = Math.min(elapsed / scrollDuration, 1); // Normalize progress from 0 to 1
            const newScrollAmount = progress * scrollWidth;
            scrollContainer.scrollLeft = newScrollAmount;

            if (progress < 1) {
                requestAnimationFrame(scroll);
            } else {
                // Reset scroll position for continuous effect
                scrollContainer.scrollLeft = 0;
                requestAnimationFrame(animateScroll); // Restart the animation
            }
        }

        requestAnimationFrame(scroll);
    }

    animateScroll();
});

