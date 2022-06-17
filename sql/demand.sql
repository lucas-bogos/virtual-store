DROP TABLE demand;

CREATE TABLE demand (
  id_demand INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_pre_purchase INT UNSIGNED,
  payment_method VARCHAR(80),
  status ENUM('Await', 'Received', 'Sent', 'Delivered') DEFAULT 'Await',
  paid BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (id_pre_purchase) REFERENCES pre_purchase(id_pre_purchase)
);
