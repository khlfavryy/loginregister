<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="login-box">
    <h2>Create Account</h2>
    <form>
      <input type="text" placeholder="Username" required />
      <input type="password" placeholder="Password" required />
      <button type="submit">Register</button>
    </form>

    <p class="register-link">
      Already have an account?
      <a href="login.html">Login here</a>
    </p>
    <script>
  document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah submit
    // Simulasi register berhasil
    window.location.href = "home.php";
  });
</script>
  </div>
</body>
</html>