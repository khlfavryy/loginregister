<?php
session_start();
include 'config.php';

// Ambil username dari session
$username = $_SESSION['username'] ?? 'skeithara';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Account - Nature Blog</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: url('forest.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #333;
    }

    header {
      padding: 16px 32px;
      background-color: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(6px);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 24px;
      color: #4d2f6b;
    }

    .nav-buttons a {
      text-decoration: none;
      color: #4d2f6b;
      margin-left: 16px;
      padding: 8px 16px;
      background-color: #e4d9f7;
      border-radius: 20px;
      transition: 0.3s;
    }

    .nav-buttons a:hover {
      background-color: #cdbbed;
    }

    .profile-container {
      max-width: 500px;
      margin: 80px auto;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
      text-align: center;
    }

    .profile-container h2 {
      margin: 0;
      color: #4d2f6b;
      font-size: 26px;
    }

    .profile-container p {
      font-size: 14px;
      color: #555;
      margin-top: 10px;
      margin-bottom: 24px;
    }

    .line-divider {
      width: 60%;
      height: 2px;
      background-color: #cbbbe2;
      margin: 24px auto;
      border-radius: 2px;
    }
  </style>
</head>
<body>

  <header>
    <h1>My Account</h1>
    <div class="nav-buttons">
      <a href="home.php">Home</a>
      <a href="upload.php">Upload</a>
      <a href="login.php">Logout</a>
    </div>
  </header>

  <div class="profile-container">
    <h2><?= htmlspecialchars($username); ?></h2>
    <p>✨ nature lover. peaceful soul. dreaming big. ✨</p>
    <div class="line-divider"></div>
    <p style="font-size: 13px; color: #888;">you are part of this beautiful scenery 🌲</p>
  </div>

</body>
</html>