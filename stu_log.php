<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

 <h1>Student and Admin Login</h1>
 <div class="contain">
 <form action="" method="post">
 <table>
 <tr>
 <td><label for="">User Name</label></td>
 <td><input type="text" name="Uname"></td>
 </tr>
 <tr>
 <td><label for="">Password</label></td>
 <td><input type="password" name="pass"></td>
 </tr>
 <tr>
 <td><br></td>
 </tr>
 <tr>
 <td align="center" colspan="2"><input type="submit"
 name="sub"></td>
 </tr>
 </table>
 </div>
 </form>
 <?php
 session_start();
 if (isset($_POST['sub'])) {
 $user = $_POST['Uname'];
 $pass = $_POST['pass'];
 if ($user == "admin" and $pass == "admin") {
 header("Location: admin.php");
 } else {
 $conn = mysqli_connect("localhost", "root", "", "studentreg");
 if (!$conn) {
  
    echo "Connection has Failed";
    } else {
    $sql = "SELECT id,password FROM students WHERE id='$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) != 0) {
    if ($row['password'] == $pass) {
    echo "$row[id]";
    $_SESSION["qwe"] = $row['id'];
    header("Location: student.php");
    } else {
    echo "Password Inccorrect";
    }
    } else {
    echo "Invalid User";
    }
    mysqli_close( $conn );
    }
    }
    }
    ?>
    </body>
    </html>