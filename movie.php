<?php
// movie.php - Individual Movie Detail Page
session_start();

// Get movie ID from URL
$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Sample movie data (in production, fetch from database)
$movies = [
    1 => [
        'title' => 'Sample Movie 1',
        'year' => '2024',
        'genre' => 'Action, Adventure',
        'duration' => '2h 15m',
        'rating' => '8.5',
        'director' => 'John Director',
        'cast' => 'Actor One, Actor Two, Actor Three',
        'description' => 'This is a sample movie description. An epic adventure that takes you through amazing landscapes and thrilling action sequences. Perfect for action movie lovers.',
        'thumbnail' => 'assets/images/movie1.jpg',
        'poster' => 'assets/images/poster1.jpg',
        'trailer' => 'assets/videos/trailer1.mp4'
    ],
    2 => [
        'title' => 'Sample Movie 2',
        'year' => '2024',
        'genre' => 'Drama',
        'duration' => '1h 58m',
        'rating' => '7.8',
        'director' => 'Jane Director',
        'cast' => 'Actor Four, Actor Five, Actor Six',
        'description' => 'A powerful drama that explores the depths of human emotion and relationships. A must-watch for drama enthusiasts.',
        'thumbnail' => 'assets/images/movie2.jpg',
        'poster' => 'assets/images/poster2.jpg',
        'trailer' => 'assets/videos/trailer2.mp4'
    ]
];

// Get movie details or use default
$movie = isset($movies[$movie_id]) ? $movies[$movie_id] : $movies[1];
$page_title = $movie['title'] . " - Movie Details";

include 'includes/header.php';
?>

<main class="main-content movie-detail">
    <div class="container">
        <!-- Movie Header -->
        <div class="movie-header">
            <div class="movie-poster">
                <img src="<?php echo htmlspecialchars($movie['poster']); ?>" 
                     alt="<?php echo htmlspecialchars($movie['title']); ?>">
            </div>
            <div class="movie-details">
                <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
                <div class="movie-meta-info">
                    <span class="rating">⭐ <?php echo htmlspecialchars($movie['rating']); ?></span>
                    <span class="year"><?php echo htmlspecialchars($movie['year']); ?></span>
                    <span class="duration">⏱ <?php echo htmlspecialchars($movie['duration']); ?></span>
                </div>
                <div class="movie-genre">
                    <strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?>
                </div>
                <div class="movie-description">
                    <p><?php echo htmlspecialchars($movie['description']); ?></p>
                </div>
                <div class="movie-credits">
                    <p><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></p>
                    <p><strong>Cast:</strong> <?php echo htmlspecialchars($movie['cast']); ?></p>
                </div>
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="alert('Play functionality would be implemented here')">
                        ▶ Play Now
                    </button>
                    <button class="btn btn-secondary" onclick="alert('Trailer would play here')">
                        🎬 Watch Trailer
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Movies -->
        <section class="related-movies">
            <h2>You May Also Like</h2>
            <div class="movie-grid">
                <?php
                // Show other movies as related
                foreach ($movies as $id => $related_movie) {
                    if ($id != $movie_id) {
                ?>
                    <div class="movie-card">
                        <div class="movie-thumbnail">
                            <img src="<?php echo htmlspecialchars($related_movie['thumbnail']); ?>" 
                                 alt="<?php echo htmlspecialchars($related_movie['title']); ?>">
                            <div class="movie-overlay">
                                <a href="movie.php?id=<?php echo $id; ?>" class="play-button">
                                    ▶ Watch Now
                                </a>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h3><?php echo htmlspecialchars($related_movie['title']); ?></h3>
                            <div class="movie-meta">
                                <span class="rating">⭐ <?php echo htmlspecialchars($related_movie['rating']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
