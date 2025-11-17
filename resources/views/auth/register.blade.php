<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - E-Blox Store</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #fff;
      color: #333;
    }

    /* HEADER */
    header {
      padding: 15px 30px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header .logo {
      font-size: 20px;
      font-weight: bold;
      color: #2d70ee;
      display: flex;
      align-items: center;
    }

    header .logo img {
      height: 24px;
      margin-right: 5px;
    }

    /* CONTAINER */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 90vh;
      padding: 20px;
    }

    /* LEFT SECTION */
    .left {
      flex: 1;
      text-align: center;
      padding: 20px;
    }

    .left h1 {
      color: #2d70ee;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .left p {
      color: #555;
      margin-bottom: 20px;
      font-size: 15px;
    }

    .left img {
      max-width: 350px;
    }

    /* RIGHT SECTION */
    .right {
      flex: 1;
      display: flex;
      justify-content: center;
      padding: 20px;
    }

    .register-box {
      width: 420px;
      padding: 40px 30px;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0px 6px 18px rgba(0,0,0,0.15);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .register-box h2 {
      font-size: 22px;
      margin-bottom: 25px;
      text-align: center;
      color: #2d70ee;
    }

    .register-box input {
      width: 90%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 14px;
      text-align: center;
    }

    .register-box button {
      width: 95%;
      padding: 12px;
      background: #2d70ee;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
    }

    .register-box button:hover {
      background: #1f55bb;
    }

    footer {
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: #888;
      border-top: 1px solid #eee;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Shopee_logo.svg" alt="">
    E-Blox Store
  </div>
</header>

<div class="container">
  <div class="left">
    <h1>Buka Toko Anda Sekarang!</h1>
    <p>Gabung menjadi bagian dari E-Blox Seller Centre dan kembangkan bisnis Anda</p>
    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png" alt="Ilustrasi">
  </div>

  <div class="right">
    <div class="register-box">
      <h2>Register</h2>

      <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <input type="text" name="first_name" placeholder="Nama Depan" required>
        <input type="text" name="last_name" placeholder="Nama Belakang" required>
        <input type="text" name="username" placeholder="Nama Pengguna" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Nomor Telepon" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit">REGISTER</button>
      </form>

      <p style="margin-top: 12px; font-size:14px;">
        Sudah punya akun?
        <a href="{{ route('login') }}" style="color:#2d70ee; font-weight:bold;">Login</a>
      </p>

    </div>
  </div>
</div>

<footer>
  © E-Blox 2025. Hak Cipta Dilindungi
</footer>

</body>
</html>