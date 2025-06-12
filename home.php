<?php
// Koneksi DB
$conn = new mysqli("localhost", "root", "", "nature_blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil semua postingan
$sql = "SELECT posts.*, users.username, users.profile_picture FROM posts 
        JOIN users ON posts.user_id = users.id 
        ORDER BY posts.created_at DESC";
$result = $conn->query($sql);
?><!DOCTYPE html><html>
<head>
  <title>Nature Blog</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color:rgb(192, 210, 237);
      margin: 0;
      padding: 0;
    }header {
  background-color:rgb(218, 190, 218);
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 100;
}

header h1 {
  margin: 0;
  font-size: 24px;
  color: #2b7a78;
}

.top-right {
  display: flex;
  align-items: center;
}

.top-right a {
  background-color: #2b7a78;
  color: #fff;
  padding: 8px 16px;
  border-radius: 8px;
  text-decoration: none;
  margin-left: 10px;
  transition: background-color 0.3s;
}

.top-right a:hover {
  background-color: #205e5a;
}

.container {
  padding: 40px;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 30px;
}

.card {
  background-color: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
}

.card:hover {
  transform: translateY(-5px);
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card .info {
  padding: 15px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 120px;
}

.username {
  font-size: 14px;
  color: #888;
  margin-bottom: 8px;
  display: flex;
  align-items: center;
}

.profile-pic {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 10px;
}

.caption {
  font-size: 16px;
  color: #333;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}

p {
  text-align: center;
  font-size: 18px;
  color: #777;
}

  </style>
</head>
<body>  <header>
    <h1>🌿 Nature Blog</h1>
    <div class="top-right">
      <a href="upload.php">Upload</a>
      <a href="profile.php">My Account</a>
      <a href="logout.php">Logout</a>
    </div>
  </header>  <div class="container">
    <div class="grid">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="card">
            <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Post image">
            <div class="info">
              <div class="username">
                <img class="profile-pic" src="<?= htmlspecialchars($row['profile_picture']) ?>" alt="Profile Picture">
                <?= htmlspecialchars($row['username']) ?>
              </div>
              <div class="caption"><?= htmlspecialchars($row['caption']) ?></div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Belum ada postingan 😥</p>
      <?php endif; ?>
    </div>
  </div></body>
</html>