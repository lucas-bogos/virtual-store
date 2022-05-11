DROP TABLE user;

CREATE TABLE user (
  id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(80) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  phone_number INT UNSIGNED NOT NULL,
  user_birth DATE('yyyy-mm-dd') NOT NULL,
  user_photo VARCHAR(180),
  user_doc VARCHAR(11),
  user_address VARCHAR(150)
), ENGINE=innoDB;
