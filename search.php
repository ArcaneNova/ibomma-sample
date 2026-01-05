<?php
// search.php - Search Movies
session_start();

// Get search query
$search_query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
$page_title = "Search Results";

// Sample search results (in production, query database)
$search_results = [];
if (!empty($search_query)) {
    $search_results = [
        ['id' => 1, 'title' => 'Search Result Movie 1', 'year' => '2024', 'genre' => 'Action', 'rating' => '8.5', 'thumbnail' => 'assets/images/movie1.jpg'],
        ['id' => 2, 'title' => 'Search Result Movie 2', 'year' => '2023', 'genre' => 'Drama', 'rating' => '7.8', 'thumbnail' => 'assets/images/movie2.jpg'],
    ];
}

include 'includes/header.php';
?>

<main class="main-content search-page">
    <div class="container">
        <div class="search-header">
            <h1>Search Results</h1>
            <?php if (!empty($search_query)): ?>
                <p>Showing results for: <strong>"<?php echo $search_query; ?>"</strong></p>
            <?php endif; ?>
        </div>

        <!-- Search Form -->
        <form action="search.php" method="GET" class="search-form">
            <input type="text" name="q" placeholder="Search for movies..." 
                   value="<?php echo $search_query; ?>" required>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Results -->
        <div class="search-results">
            <?php if (!empty($search_query)): ?>
                <?php if (!empty($search_results)): ?>
                    <div class="movie-grid">
                        <?php foreach ($search_results as $movie): ?>
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
                <?php else: ?>
                    <p class="no-results">No results found for "<?php echo $search_query; ?>". Try different keywords.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="no-query">Enter a search term to find movies.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
