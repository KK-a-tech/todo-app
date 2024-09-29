<?php
require_once('functions.php');

savePostedData($_POST);
header('Location: ./index.php');

CREATE TABLE todos (
  content_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(255),
  matrix_id MEDIUMINT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );