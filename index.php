<?php

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM admin WHERE username = '$username' and passcode = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;

      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

   $title = 'Registreren';
?>

<div class="container">
    <h2>Inloggen</h2>

    <form action="" method="POST">

        <div class="form-group">
            <label class="col-sm-3">
                Username
            </label>
            <div class="col-sm-9">
                <input type="username" name="username" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Password
            </label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Inloggen</button>

      </br>

        <a href="./signup.php">
          Registreren
        </a>

      </br>

        <a href="./lostpsw.php">
          Wachtwoord vergeten?
        </a>

</div>
<?php
