DROP TABLE user_admin;

CREATE TABLE user_admin (
    id_user_admin INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(200) NOT NULL
);
