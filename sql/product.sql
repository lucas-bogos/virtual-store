DROP TABLE product;

CREATE TABLE product (
  id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description LONGTEXT NOT NULL,
  photo VARCHAR(180) NOT NULL,
  quantity INT NOT NULL,
  price FLOAT NOT NULL,
  assurance BOOLEAN DEFAULT FALSE,
  brand VARCHAR(30),
  code VARCHAR(255),
  color ENUM('Black', 'White', 'Red', 'Green', 'Blue'),
  size ENUM('P', 'M', 'G', 'GG')
);
