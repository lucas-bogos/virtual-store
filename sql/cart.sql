DROP TABLE cart;

CREATE TABLE cart (
  id_cart INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_product INT UNSIGNED,
  id_user INT UNSIGNED,
  FOREIGN KEY (id_product) REFERENCES product(id_product),
  FOREIGN KEY (id_user) REFERENCES user(id_user)
);
