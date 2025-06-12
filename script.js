// script.js

// Fungsi untuk login user
function loginUser(event) {
  event.preventDefault();

  const user = document.getElementById("username").value;
  const pass = document.getElementById("password").value;

  if (user && pass) {
    // Simpan username ke sessionStorage
    sessionStorage.setItem('user', user);
    // Arahkan ke halaman home
    window.location.href = "home.html";
  } else {
    alert("Isi username dan password!");
  }
}

// Fungsi untuk mengecek apakah user sudah login (dipanggil di home.html)
function checkLogin() {
  const username = sessionStorage.getItem('user');
  if (!username) {
    // Kalau belum login, arahkan ke login
    window.location.href = "login.html";
  } else {
    // Ganti nama di halaman home
    document.getElementById("user").innerText = username;
  }
}

// Fungsi logout
function logout() {
  sessionStorage.removeItem('user');
  window.location.href = "index.html";
}