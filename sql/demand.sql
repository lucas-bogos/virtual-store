DROP TABLE demand;

CREATE TABLE demand (
  id_demand INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_cart INT UNSIGNED,
  payment_method VARCHAR(80)
  FOREIGN KEY id_cart REFERENCES cart(id_cart)
), ENGINE=innoDB;
