```php
<?php

$host = "multiple-apps-db.cfsiea4gms2x.eu-west-1.rds.amazonaws.com";
$user = "admin";
$password = "admin1234";
$database = "app3db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $password_data = $_POST['password'];

    $sql = "INSERT INTO admin(admin_name,email,password)
            VALUES('$admin_name','$email','$password_data')";

    if($conn->query($sql) === TRUE){
        echo "<script>alert('Data Inserted Successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM admin");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>

    <style>

        body{
            font-family: Arial;
            background:#0c2d48;
            margin:0;
            padding:40px;
            color:white;
        }

        .container{
            width:500px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:12px;
            color:black;
        }

        h1{
            text-align:center;
            margin-bottom:25px;
        }

        input{
            width:100%;
            padding:14px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:16px;
        }

        button{
            width:100%;
            padding:14px;
            background:#007bff;
            border:none;
            color:white;
            font-size:18px;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#0056cc;
        }

        table{
            width:100%;
            margin-top:30px;
            border-collapse:collapse;
        }

        th, td{
            border:1px solid #ccc;
            padding:12px;
            text-align:center;
        }

        th{
            background:#007bff;
            color:white;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Admin Registration</h1>

    <form method="POST">

        <input type="text" name="admin_name" placeholder="Enter Admin Name" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="submit">Add Admin</button>

    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['admin_name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['password']."</td>
                      </tr>";
            }
        }

        ?>

    </table>

</div>

</body>
</html>
```
