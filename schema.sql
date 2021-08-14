CREATE DATABASE yeticave
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE yeticave;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    symbol_code VARCHAR(255) UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    contact_info VARCHAR(255) NOT NULL,
    dt_reg DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    user_id INT,
    winner INT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    start_price INT UNSIGNED NOT NULL,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    dt_sell DATETIME DEFAULT CURRENT_TIMESTAMP,
    img_path VARCHAR(255) NOT NULL,
    rate_step INT UNSIGNED NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (winner) REFERENCES users(id)
);

CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    lot_id INT,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    price INT UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (lot_id) REFERENCES lots(id)
);

CREATE INDEX u_email ON users(email);
CREATE INDEX l_title ON lots(title);