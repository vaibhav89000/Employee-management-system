

<?php
session_start();
require 'db.php';
$message = '';


if ( isset($_POST['email']) && isset($_POST['password']) ) {


$email = $_POST["email"];
$password = $_POST["password"];


$stmt = $conn->prepare("SELECT * FROM admin");
$stmt->execute();
$result = $stmt->fetchAll();


foreach ($result as $r) {
if($email == $r["email"] && $password == $r["password"]) {
    //echo 'You are successfully logged in.';
    $message = 'You are successfully logged in.';
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

//     if($_SESSION['email']== true && $_SESSION['password']== true)
// {
//   header("Location: index.php");
// }
// else
// {
//   $message = 'one field is not filled.';
//   // header("Location: signin.php");

// }

    header("Location: index.php");



 }
else {
    $message = 'Invalid Username and Password';
	// echo 'Invalid Username and Password';
}
}
}


?>



<!doctype html>
<html lang="en">
  <head>
    <title>Employee details manager</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="signin.php">SIGN IN<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">SIGN UP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php">HOME</a>
      </li>
      <li class="nav-item">
      <h4>Employee management system  made by <b><i>vaibhav sharma(1803210169)</i></b></h4>
      </li>
      
    </ul>
  </div>
</nav>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>sign in</h2>
    </div>
    <div class="card-body">
        <!-- <div class="alert alert-success">
        </div> -->
        <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        
        <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>

        
        <div class="form-group">
          <button type="submit" class="btn btn-info">SIGN IN</button>
        </div>



        

















      </form>
    </div>
  </div>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>