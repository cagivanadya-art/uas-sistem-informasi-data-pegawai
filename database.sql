CREATE DATABASE uas_251011700427_data_pegawai;

USE uas_251011700427_data_pegawai;

CREATE TABLE users(

id INT AUTO_INCREMENT PRIMARY KEY,

nama VARCHAR(100),

username VARCHAR(50) UNIQUE,

password VARCHAR(255)

);

CREATE TABLE pegawai(

id INT AUTO_INCREMENT PRIMARY KEY,

nomor_pegawai VARCHAR(30),

nama_pegawai VARCHAR(100),

email VARCHAR(100),

no_telp VARCHAR(20),

status ENUM('Tetap','Kontrak','Magang'),

tanggal_mendaftar DATE,

foto VARCHAR(255)

);