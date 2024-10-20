CREATE DATABASE pemweb6;

USE pemweb6;

-- Tabel untuk menyimpan informasi pengguna
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE, -- Username harus unik
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Tabel untuk mengelola kalender
CREATE TABLE calendars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date DATE NOT NULL, -- Representasi tanggal tanpa deskripsi
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabel untuk menyimpan informasi acara
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    calendar_id INT NOT NULL,
    event_title VARCHAR(100) NOT NULL,
    event_description TEXT,
    event_date DATE NOT NULL, -- Tanggal acara
    FOREIGN KEY (calendar_id) REFERENCES calendars(id) ON DELETE CASCADE
);
