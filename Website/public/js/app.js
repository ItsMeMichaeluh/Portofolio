document.addEventListener('DOMContentLoaded', function() {
    // Subtle parallax scrolling effect
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        document.querySelectorAll('.parallax-section').forEach(element => {
            const speed = 0.05;
            element.style.transform = `translateY(${scrollPosition * speed}px)`;
        });
    });
});
