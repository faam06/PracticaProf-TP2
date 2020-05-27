<?php

  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'tp2';

  try {
      $conn = new PDO("mysql:host=$server; dbname=$database;" , $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");
  } catch (PDOException $e) {
      die('Connected failed: '.$e->getMessage());
  }


?>
