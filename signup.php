<?php
require 'db.php';
$message = '';


// if($_POST['email']=='' || $_POST['email']=='' || $_POST['password']=='')
// {
//     $message = 'data notinserted successfully';
// }

// else
// {
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['password']) ) {

    if($_POST['email']=='' || $_POST['email']=='' || $_POST['password']=='')
    {
    $message = 'INcomplete details';
    }


    else
    {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    

    $sql = 'INSERT INTO admin(name, email, password) VALUES(:name, :email, :password)';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':name' => $name, ':email' => $email, ':password' => $password])) {
        $message = 'signed up successfully';
        }
    }
}
// }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="index.php">Navbar</a> -->
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
      <h2>sign up</h2>
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
          <label for="name">NAME</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>

        
        <div class="form-group">
          <button type="submit" class="btn btn-info">SIGN UP</button>
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






