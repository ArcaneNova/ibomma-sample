<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sample movie streaming website">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Movie Streaming'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <nav class="navbar">
            <div class="container">
                <div class="nav-wrapper">
                    <div class="logo">
                        <a href="index.php">🎬 MovieStream</a>
                    </div>
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="category.php?genre=action">Movies</a></li>
                        <li><a href="category.php?genre=all">Browse</a></li>
                        <li><a href="search.php">Search</a></li>
                    </ul>
                    <div class="nav-search">
                        <form action="search.php" method="GET">
                            <input type="text" name="q" placeholder="Search movies..." class="search-input">
                            <button type="submit" class="search-btn">🔍</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
