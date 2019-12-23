<?php
session_start();
require 'db.php';

$check2= $_SESSION['email'];
$check3= $_SESSION['email'];
if($check3== true && $check2== true)
{

}
else
{
  
  header("Location: signin.php");
}





$message = '';


if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['salary']) && isset($_POST['age']) && isset($_POST['qualification']) && isset($_POST['dob']) && isset($_POST['doj'])   ) {
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $salary = strip_tags($_POST['salary']);
  $age = strip_tags($_POST['age']);
  $qualification = strip_tags($_POST['qualification']);
  $dob = strip_tags($_POST['dob']);
  $doj = strip_tags($_POST['doj']);

  $sql = 'INSERT INTO employee(name, email, salary, age, qualification, dob, doj) VALUES(:name, :email, :salary, :age, :qualification, :dob, :doj)';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':salary' => $salary, ':age' => $age, ':qualification' => $qualification, ':dob' => $dob, ':doj' => $doj ])) {
    $message = 'data inserted successfully';
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a employee</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="salary">salary</label>
          <input type="text" name="salary" id="salary" class="form-control">
        </div>

        <div class="form-group">
          <label for="age">age</label>
          <input type="text" name="age" id="age" class="form-control">
        </div>

        <div class="form-group">
          <label for="qualification">qualification</label>
          <input type="text" name="qualification" id="qualification" class="form-control">
        </div>

        <div class="form-group">
          <label for="dob">Date of birth</label>
          <input type="date" name="dob" id="dob" class="form-control">
        </div>

        <div class="form-group">
          <label for="doj">DATE of joining</label>
          <input type="date" name="doj" id="doj" class="form-control">
        </div>

        
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>



        

















      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>








