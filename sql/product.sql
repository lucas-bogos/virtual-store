DROP TABLE product;

CREATE TABLE product (
  id_product INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_title VARCHAR(255) NOT NULL,
  product_description LONGTEXT NOT NULL,
  product_photo VARCHAR(180) NOT NULL,
  product_quantity INT NOT NULL,
  product_price INT NOT NULL,
  assurance BOOLEAN DEFAULT FALSE
  product_brand VARCHAR(30),
  product_code VARCHAR(255),
  product_color ENUM('black', 'white', 'red', 'green', 'blue'),
  product_size ENUM('P', 'M', 'G', 'GG')
), ENGINE=innoDB;
