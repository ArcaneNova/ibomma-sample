<?php
// index.php - Home Page
session_start();

// Page configuration
$page_title = "Movie Streaming - Home";
$featured_movies = [
    [
        'id' => 1,
        'title' => 'Sample Movie 1',
        'year' => '2024',
        'genre' => 'Action',
        'thumbnail' => 'assets/images/movie1.jpg',
        'rating' => '8.5'
    ],
    [
        'id' => 2,
        'title' => 'Sample Movie 2',
        'year' => '2024',
        'genre' => 'Drama',
        'thumbnail' => 'assets/images/movie2.jpg',
        'rating' => '7.8'
    ],
    [
        'id' => 3,
        'title' => 'Sample Movie 3',
        'year' => '2023',
        'genre' => 'Comedy',
        'thumbnail' => 'assets/images/movie3.jpg',
        'rating' => '8.0'
    ],
    [
        'id' => 4,
        'title' => 'Sample Movie 4',
        'year' => '2024',
        'genre' => 'Thriller',
        'thumbnail' => 'assets/images/movie4.jpg',
        'rating' => '8.2'
    ]
];

include 'includes/header.php';
?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Movie Streaming</h1>
            <p>Discover and watch your favorite movies</p>
        </div>
    </section>

    <!-- Featured Movies Section -->
    <section class="featured-movies">
        <div class="container">
            <h2>Featured Movies</h2>
            <div class="movie-grid">
                <?php foreach ($featured_movies as $movie): ?>
                    <div class="movie-card">
                        <div class="movie-thumbnail">
                            <img src="<?php echo htmlspecialchars($movie['thumbnail']); ?>" 
                                 alt="<?php echo htmlspecialchars($movie['title']); ?>">
                            <div class="movie-overlay">
                                <a href="movie.php?id=<?php echo $movie['id']; ?>" class="play-button">
                                    ▶ Watch Now
                                </a>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                            <div class="movie-meta">
                                <span class="year"><?php echo htmlspecialchars($movie['year']); ?></span>
                                <span class="genre"><?php echo htmlspecialchars($movie['genre']); ?></span>
                                <span class="rating">⭐ <?php echo htmlspecialchars($movie['rating']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2>Browse by Category</h2>
            <div class="category-list">
                <a href="category.php?genre=action" class="category-item">Action</a>
                <a href="category.php?genre=drama" class="category-item">Drama</a>
                <a href="category.php?genre=comedy" class="category-item">Comedy</a>
                <a href="category.php?genre=thriller" class="category-item">Thriller</a>
                <a href="category.php?genre=romance" class="category-item">Romance</a>
                <a href="category.php?genre=scifi" class="category-item">Sci-Fi</a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
