<?php
// database.php - Database configuration (sample)

// Database configuration constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'movie_streaming');
define('DB_USER', 'root');
define('DB_PASS', '');

// Database connection class
class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $conn = null;

    // Get database connection
    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        
        return $this->conn;
    }
}

// Sample database schema SQL (for reference)
/*
CREATE DATABASE IF NOT EXISTS movie_streaming;

USE movie_streaming;

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    year INT,
    genre VARCHAR(100),
    duration INT,
    rating DECIMAL(3,1),
    director VARCHAR(255),
    cast TEXT,
    thumbnail VARCHAR(255),
    poster VARCHAR(255),
    video_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT
);

CREATE TABLE movie_categories (
    movie_id INT,
    category_id INT,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    PRIMARY KEY (movie_id, category_id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE watchlist (
    user_id INT,
    movie_id INT,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    PRIMARY KEY (user_id, movie_id)
);
*/
?>
