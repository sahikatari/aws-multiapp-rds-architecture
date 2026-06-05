<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>App3 Admin Portal</title>

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family: Arial, sans-serif;
    }

    body{
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background: linear-gradient(to right, #071b2e, #0c2d48);
    }

    .container{
      width:450px;
      background:#fff;
      padding:40px;
      border-radius:18px;
      text-align:center;
      box-shadow:0 10px 30px rgba(0,0,0,0.4);
    }

    .rocket{
      font-size:42px;
      margin-bottom:15px;
    }

    h1{
      font-size:42px;
      color:#222;
      margin-bottom:15px;
    }

    p{
      color:#666;
      margin-bottom:30px;
      font-size:18px;
    }

    .btn{
      display:inline-block;
      width:100%;
      padding:16px;
      background: linear-gradient(to right,#11c0f3,#0066ff);
      color:white;
      text-decoration:none;
      border-radius:10px;
      font-size:20px;
      transition:0.3s;
    }

    .btn:hover{
      transform:scale(1.03);
      opacity:0.9;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="rocket">🚀</div>

    <h1>Welcome to App3<br>Admin Portal</h1>

    <p>Simple Cloud Admin System using AWS RDS</p>

    <a href="admin.php" class="btn">Go to Admin Panel</a>
  </div>

</body>
</html>
