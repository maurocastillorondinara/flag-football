/**
 * Flag Football MDP - Main JavaScript
 *
 * Vanilla JS replacing React state management.
 * Handles: scroll detection, hamburger menu toggle.
 */

document.addEventListener('DOMContentLoaded', () => {
    // === Header scroll effect ===
    const header = document.querySelector('.header');

    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });
    }

    // === Mobile hamburger menu ===
    const toggle = document.querySelector('.mobile-toggle');
    const nav = document.querySelector('.nav');
    const bars = document.querySelectorAll('.bar');
    const navLinks = document.querySelectorAll('.nav a');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('active');
            bars.forEach(bar => bar.classList.toggle('open', isOpen));
        });

        // Close menu when clicking a nav link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                bars.forEach(bar => bar.classList.remove('open'));
            });
        });
    }
});
