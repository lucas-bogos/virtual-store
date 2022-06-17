DROP TABLE user;

CREATE TABLE user (
  id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(80) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  user_birth DATE NOT NULL,
  user_photo VARCHAR(180),
  rg VARCHAR(10),
  cpf VARCHAR(11),
  street VARCHAR(150),
  street_number INT UNSIGNED,
  district VARCHAR(80),
  state VARCHAR(80),
  city VARCHAR(80),
  zip_code VARCHAR(20)
);
