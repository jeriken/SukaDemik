<?php
session_start();
include_once("include/config.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Muhammad Razin ">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Homepage</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/side.css" rel="stylesheet">

  <script src="https://unpkg.com/feather-icons"></script>

  <style>
  </style>
</head>

<body>

  <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <br>
        <li class="sidebar-brand">
          <a href="dashboard.php">
            <h3 class="text-white">Suka Demik</h3>
          </a>
        </li>
        <li>
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li>
          <a href="ambil.php">Ambil KRS</a>
        </li>
        <li>
          <a href="krsku.php">Lihat KRS</a>
        </li>
        <li>
          <a href="data.php">Semua Data</a>
        </li>
        <li>
          <a href="tambah.php">Tambah Data</a>
        </li>
        <li>
          <a href="logout.php">Keluar</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->