// script.js - Main JavaScript file

document.addEventListener('DOMContentLoaded', function() {
    console.log('Movie Streaming Website Loaded');

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading animation to movie cards
    const movieCards = document.querySelectorAll('.movie-card');
    movieCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Search form validation
    const searchForms = document.querySelectorAll('form[action="search.php"]');
    searchForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const input = this.querySelector('input[name="q"]');
            if (input && input.value.trim() === '') {
                e.preventDefault();
                alert('Please enter a search term');
                input.focus();
            }
        });
    });

    // Add active class to current page in navigation
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.style.color = 'var(--primary-color)';
            link.style.fontWeight = 'bold';
        }
    });

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Movie rating hover effect
    const ratingElements = document.querySelectorAll('.rating');
    ratingElements.forEach(rating => {
        rating.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.3s';
        });
        rating.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});

// Function to handle play button clicks
function playMovie(movieId) {
    console.log('Playing movie with ID:', movieId);
    alert('Video player would open here for movie ID: ' + movieId);
    // In production, this would trigger a video player modal or redirect
}

// Function to add movie to watchlist
function addToWatchlist(movieId) {
    console.log('Adding movie to watchlist:', movieId);
    alert('Movie added to watchlist!');
    // In production, this would make an AJAX call to save to database
}

// Function to rate a movie
function rateMovie(movieId, rating) {
    console.log('Rating movie:', movieId, 'with', rating, 'stars');
    alert('Thank you for rating this movie ' + rating + ' stars!');
    // In production, this would save the rating to database
}

// Utility function to format duration
function formatDuration(minutes) {
    const hours = Math.floor(minutes / 60);
    const mins = minutes % 60;
    return hours + 'h ' + mins + 'm';
}

// Export functions for use in other scripts
window.movieApp = {
    playMovie,
    addToWatchlist,
    rateMovie,
    formatDuration
};
