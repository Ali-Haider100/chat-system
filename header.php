<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <?php
  session_start();
  ini_set("display_errors", "1");
  error_reporting(E_ALL);
   $path = $_SERVER['PHP_SELF'];
  if(basename($path) == "index.php" || basename($path) == "register.php" || basename($path) == "all-users.php" ||
  basename($path) == "profile.php" || basename($path) == "ajax.php" || basename($path) == "email.php" 
  || basename($path) == "recover-password.php"){
    require 'includes/databasec.php';
    require 'includes/select.php';
    require 'includes/loginr.php';
    require 'includes/image.php'; 
    require 'includes/check.php';
    require 'includes/validation.php';
    require 'includes/IU.php';
    require 'includes/random.php';
  }else {
    
    require 'databasec.php';
    require 'select.php';
    require 'loginr.php';
    require 'image.php'; 
    require 'check.php';
    require 'validation.php';
    require 'IU.php';
    require 'random.php';
  }
  ?>
</head>