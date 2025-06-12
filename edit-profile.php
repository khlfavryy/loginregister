<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile - Nature Blog</title>
  <link rel="stylesheet" href="styles.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #f2e9fb, #d4f2ec);
      color: #333;
      margin: 0;
      padding: 0;
    }

    header {
      padding: 16px 32px;
      background-color: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(6px);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    main {
      max-width: 600px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    h2 {
      color: #4d2f6b;
      margin-bottom: 20px;
    }

    form label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 12px;
      margin-bottom: 16px;
      font-size: 14px;
      font-family: inherit;
    }

    button {
      background-color: #4d2f6b;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 20px;
      font-size: 14px;
      cursor: pointer;
    }

    button:hover {
      background-color: #3a2457;
    }
  </style>
</head>
<body>

  <header>
    <h1>Edit Profile</h1>
    <a href="profile.php" style="color:#4d2f6b; text-decoration:none;">← Back to Profile</a>
  </header>

  <main>
    <h2>Edit Your Profile</h2>
    <form>
      <label for="username">Username</label>
      <input type="text" id="username" value="keith_nature" />

      <label for="bio">Bio</label>
      <textarea id="bio" rows="3">Lover of clouds, forests, and quiet mornings 🍃</textarea>

      <label for="photo">Profile Picture</label>
      <input type="file" id="photo" />

      <button type="submit">Save Changes</button>
    </form>
  </main>

</body>
</html>