-- Digunakan kalau database inventaris_db SUDAH ADA
USE inventaris_db;

-- Tabel admins
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Tabel inventaris
CREATE TABLE IF NOT EXISTS inventaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    spesifikasi VARCHAR(255),
    jumlah INT,
    status VARCHAR(20) DEFAULT 'tersedia'
);

-- Tabel riwayat
CREATE TABLE IF NOT EXISTS riwayat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inventaris_id INT,
    peminjam VARCHAR(100),
    tanggal_pinjam DATETIME,
    tanggal_kembali DATETIME,
    status VARCHAR(20),
    FOREIGN KEY (inventaris_id) REFERENCES inventaris(id) ON DELETE CASCADE
);
