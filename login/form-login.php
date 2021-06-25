
<!DOCTYPE html>

<html lang="en">

<head>
  <script src="js/validasi.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Penyewaan Mobil</div>
      <div class='input-fields'>
      <form action="cek_login.php" method="post">
        <input type='text' placeholder='Username' name='username' class='input-line full-width'></input>
        <input type='password' placeholder='Password' name='password' class='input-line full-width'></input>

      </div>
      <div><button class='ghost-round full-width'>Create Account</button></div>
    </div>
  </div>
</div>
</form>
</body>

</html>