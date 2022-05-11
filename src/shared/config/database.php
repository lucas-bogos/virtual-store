<?php

define("DBCONFIG", [
  "driver" => getenv("DRIVER"),
  "dbhost" => getenv("DBHOST"),
  "dbname" => getenv("DBNAME"),
  "dbusr" => getenv("DBUSER"),
  "dbpass" => getenv("DBPASS")
]);
