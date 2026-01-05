<?php
// category.php - Browse Movies by Category
session_start();

// Get genre from URL
$genre = isset($_GET['genre']) ? htmlspecialchars($_GET['genre']) : 'all';
$page_title = ucfirst($genre) . " Movies";

// Sample movies by category
$all_movies = [
    'action' => [
        ['id' => 1, 'title' => 'Action Movie 1', 'year' => '2024', 'rating' => '8.5', 'thumbnail' => 'assets/images/action1.jpg'],
        ['id' => 2, 'title' => 'Action Movie 2', 'year' => '2023', 'rating' => '8.0', 'thumbnail' => 'assets/images/action2.jpg'],
    ],
    'drama' => [
        ['id' => 3, 'title' => 'Drama Movie 1', 'year' => '2024', 'rating' => '7.8', 'thumbnail' => 'assets/images/drama1.jpg'],
        ['id' => 4, 'title' => 'Drama Movie 2', 'year' => '2024', 'rating' => '8.2', 'thumbnail' => 'assets/images/drama2.jpg'],
    ],
    'comedy' => [
        ['id' => 5, 'title' => 'Comedy Movie 1', 'year' => '2024', 'rating' => '7.5', 'thumbnail' => 'assets/images/comedy1.jpg'],
        ['id' => 6, 'title' => 'Comedy Movie 2', 'year' => '2023', 'rating' => '7.9', 'thumbnail' => 'assets/images/comedy2.jpg'],
    ]
];

// Get movies for selected genre
$movies = isset($all_movies[$genre]) ? $all_movies[$genre] : [];

include 'includes/header.php';
?>

<main class="main-content category-page">
    <div class="container">
        <div class="page-header">
            <h1><?php echo ucfirst($genre); ?> Movies</h1>
            <p>Browse all <?php echo $genre; ?> movies</p>
        </div>

        <!-- Filters -->
        <div class="filters">
            <select class="filter-select" onchange="window.location.href='category.php?genre='+this.value">
                <option value="all" <?php echo $genre == 'all' ? 'selected' : ''; ?>>All Genres</option>
                <option value="action" <?php echo $genre == 'action' ? 'selected' : ''; ?>>Action</option>
                <option value="drama" <?php echo $genre == 'drama' ? 'selected' : ''; ?>>Drama</option>
                <option value="comedy" <?php echo $genre == 'comedy' ? 'selected' : ''; ?>>Comedy</option>
                <option value="thriller" <?php echo $genre == 'thriller' ? 'selected' : ''; ?>>Thriller</option>
            </select>
        </div>

        <!-- Movie Grid -->
        <div class="movie-grid">
            <?php if (!empty($movies)): ?>
                <?php foreach ($movies as $movie): ?>
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
                                <span class="rating">⭐ <?php echo htmlspecialchars($movie['rating']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-results">No movies found in this category.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
