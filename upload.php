<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "nature_blog");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Variabel status
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caption = $_POST['caption'] ?? '';
    $user_id = 1; // default sementara
    $uploadDir = "uploads/";
    $filename = basename($_FILES["image"]["name"]);
    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, image_path, caption) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $targetFile, $caption);
        if ($stmt->execute()) {
            $status = "✅ Post berhasil diupload!";
        } else {
            $status = "❌ Gagal masukkan ke database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $status = "❌ Gagal upload gambar.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload Postingan 🌿</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #fce4ec);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .upload-container {
      background-color: #ffffffdd;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 450px;
      width: 100%;
      text-align: center;
    }

    h2 {
      color: #2e7d32;
      margin-bottom: 20px;
    }

    input[type="file"], textarea {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #388e3c;
    }

    .status {
      margin-top: 20px;
      font-weight: bold;
      color: #d32f2f;
    }

    .success {
      color: #388e3c;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      color: #1e88e5;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="upload-container">
    <h2>✨ Upload Postingan Baru</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image" accept="image/*" required><br>
      <textarea name="caption" rows="4" placeholder="Tulis caption kamu di sini..." required></textarea><br>
      <input type="submit" value="Upload 🌸">
    </form>

    <?php if ($status): ?>
      <div class="status <?= strpos($status, '✅') !== false ? 'success' : '' ?>">
        <?= htmlspecialchars($status) ?>
      </div>
    <?php endif; ?>

    <a href="home.php">← Kembali ke Home</a>
  </div>
</body>
</html>