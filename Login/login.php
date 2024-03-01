<?php 
  include '../connection.php';
  session_start();

  function generateToken() {
    return bin2hex(random_bytes(32));
}
  if(isset($_POST['login'])){
    
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die ('query failed');
    if(mysqli_num_rows($select_user)>0){
      $row = mysqli_fetch_assoc($select_user);
      if($row['type'] == 'admin') {
        $_SESSION['admin_id'] = $row['id'];
        sleep(1);
        header('location:../Admin/admin_home.php');
      }else if($row['type'] == 'user') {
        $_SESSION['user_id'] = $row['id'];
        sleep(1);
        header('location:../user/user_home.php');
      }else if($row['type'] == 'employee') {
        $_SESSION['employee_id'] = $row['id'];
        sleep(1);
        header('location:../employee/employee_home.php');
      }

      if(isset($_POST['remember'])) {
        $token = generateToken();
        setcookie('IstoriaCookie', $token, time() + (86400 * 30), "/"); 
    }
    }
    else{
      header('location:login.php');  
    }
  }

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/styles_login.css" />
    <title>Login</title>
</head>

<body>
    <div class="loginform">
        <div class="column1">
            <img src="../assets/Images/login.png" width="740" alt="" />
        </div>
        <div class="column2">
            <div class="brandings">
                <img src="/assets/Images/logo2.png" alt="" />
                <img class="img2" src="/assets/Images/logo3.png" alt="" />
            </div>
            <div class="loginbox">
                <form method="post">
                    <h1>LOG IN</h1>
                    <input name=" email" type="text" required placeholder="EMAIL" aut />
                    <input name="password" type="password" id="password" required placeholder="PASSWORD" />
                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <i id="eyeIcon2" class="fa fa-eye"></i>
                    </span>
                    <div class="agree">
                        <input class="check" type="checkbox" name="remember" id="agree" />
                        <label>
                            <p>REMEMBER ME</p>
                        </label>
                    </div>

                    <div class="button">
                        <h1>DON'T HAVE AN ACCOUNT? <a href="signup.php">SIGN UP</a></h1>
                        <button name="login" class="btn w-50" type="submit">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../Src/Javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/8a364c3095.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>