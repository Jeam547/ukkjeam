1.data base
CREATE DATABASE customer_db;

USE customer_db;

CREATE TABLE customers (
    id_customer INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_telp VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

2.sepeda
CREATE DATABASE rental_sepeda_db;

USE rental_sepeda_db;

CREATE TABLE sepeda (
    id_sepeda INT AUTO_INCREMENT PRIMARY KEY,
    merk VARCHAR(50) NOT NULL,
    tipe VARCHAR(50) NOT NULL,
    warna VARCHAR(30) NOT NULL,
    harga_sewa DECIMAL(10,2) NOT NULL,
    status ENUM('Tersedia', 'Disewa') NOT NULL DEFAULT 'Tersedia',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

atau

USE customer_db;

CREATE TABLE sepeda (
    id_sepeda INT AUTO_INCREMENT PRIMARY KEY,
    merk VARCHAR(50) NOT NULL,
    tipe VARCHAR(50) NOT NULL,
    warna VARCHAR(30) NOT NULL,
    harga_sewa DECIMAL(10,2) NOT NULL,
    status ENUM('Tersedia', 'Disewa') NOT NULL DEFAULT 'Tersedia',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3.rental

USE customer_db;

CREATE TABLE rental (
    id_rental INT AUTO_INCREMENT PRIMARY KEY,
    id_customer INT NOT NULL,
    id_sepeda INT NOT NULL,
    tanggal_sewa DATETIME NOT NULL,
    tanggal_kembali DATETIME DEFAULT NULL,
    total_biaya DECIMAL(10,2) NOT NULL,
    status ENUM('Disewa', 'Dikembalikan') NOT NULL DEFAULT 'Disewa',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_customer) REFERENCES customers(id_customer) ON DELETE CASCADE,
    FOREIGN KEY (id_sepeda) REFERENCES sepeda(id_sepeda) ON DELETE CASCADE
);

4.login
CREATE DATABASE database_login;

USE database_login;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
