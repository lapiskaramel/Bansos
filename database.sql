-- Membuat Database
CREATE DATABASE IF NOT EXISTS bansos_db;
USE bansos_db;

-- Membuat tabel pengguna untuk fitur Login (Session)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Memasukkan data admin default (Username: admin, Password: password123)
INSERT INTO users (username, password) VALUES ('admin', 'password123');

-- Membuat tabel Data Keluarga
CREATE TABLE IF NOT EXISTS keluarga (
    id_keluarga INT AUTO_INCREMENT PRIMARY KEY,
    no_kk VARCHAR(20) NOT NULL,
    nama_kepala VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    kondisi_rumah ENUM('Layak', 'Tidak Layak') NOT NULL,
    kategori_miskin ENUM('Ya', 'Tidak') NOT NULL
);
