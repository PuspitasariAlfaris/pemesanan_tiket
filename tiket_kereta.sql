CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tiket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama VARCHAR(100),
    asal VARCHAR(100),
    tujuan VARCHAR(100),
    tanggal DATE,
    jumlah INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);