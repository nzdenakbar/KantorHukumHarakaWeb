CREATE DATABASE IF NOT EXISTS haraka_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE haraka_db;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_layanan VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL UNIQUE,
    deskripsi TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT IGNORE INTO services (nama_layanan, slug, deskripsi) VALUES
('Litigasi','litigasi','Pendampingan hukum dalam berbagai kasus di pengadilan.'),
('Konsultasi Hukum','konsultasi-hukum','Konsultasi hukum secara langsung maupun online.'),
('Retainer / In-House Lawyer','retainer','Pendampingan hukum berkelanjutan untuk perusahaan.'),
('Layanan Pengurusan Perizinan','perizinan','Pengurusan izin usaha dan dokumen legal.'),
('Audit Hukum','audit-hukum','Evaluasi dan analisis kepatuhan hukum perusahaan.'),
('Legal Drafting & Legal Opinion','legal-drafting','Penyusunan dokumen dan pendapat hukum.');

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_booking VARCHAR(30) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    no_whatsapp VARCHAR(30) NOT NULL,
    layanan VARCHAR(150) NOT NULL,
    tanggal DATE NOT NULL,
    jam TIME NOT NULL,
    metode_konsultasi ENUM('Tatap Muka','WhatsApp','Zoom','Google Meet') NOT NULL DEFAULT 'Tatap Muka',
    deskripsi_masalah TEXT NOT NULL,
    status ENUM('Menunggu','Dikonfirmasi','Selesai','Dibatalkan') NOT NULL DEFAULT 'Menunggu',
    catatan_admin TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_booking_date (tanggal, jam),
    INDEX idx_booking_status (status)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    no_whatsapp VARCHAR(30) NULL,
    layanan VARCHAR(150) NOT NULL,
    metode VARCHAR(50) NOT NULL DEFAULT 'Belum dipilih',
    pesan TEXT NOT NULL,
    status ENUM('Baru','Dibaca','Diproses','Selesai') NOT NULL DEFAULT 'Baru',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_consultation_status (status)
) ENGINE=InnoDB;

-- Admin dibuat aman melalui setup_admin.php agar password disimpan dengan password_hash().
