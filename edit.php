<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM employee WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['salary']) && isset($_POST['age']) && isset($_POST['qualification']) && isset($_POST['dob']) && isset($_POST['doj']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $salary = $_POST['salary'];
  $age = $_POST['age'];
  $qualification = $_POST['qualification'];
  $dob = $_POST['dob'];
  $doj = $_POST['doj'];
  $sql = 'UPDATE employee SET name=:name, email=:email, salary=:salary, age=:age, qualification=:qualification, dob=:dob, doj=:doj WHERE id=:id';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id, ':salary' => $salary, ':age' => $age, ':qualification' => $qualification, ':dob' => $dob, ':doj' => $doj ])) {
    header("Location: index.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
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
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="salary">salary</label>
          <input type="text" value="<?= $person->salary; ?>" name="salary" id="salary" class="form-control">
        </div>

        <div class="form-group">
          <label for="age">age</label>
          <input type="text" value="<?= $person->age; ?>" name="age" id="age" class="form-control">
        </div>

        <div class="form-group">
          <label for="qualification">qualification</label>
          <input type="text" value="<?= $person->qualification; ?>" name="qualification" id="qualification" class="form-control">
        </div>

        <div class="form-group">
          <label for="dob">Date of birth</label>
          <input type="date" value="<?= $person->dob; ?>" name="dob" id="dob" class="form-control">
        </div>

        <div class="form-group">
          <label for="doj">DATE of joining</label>
          <input type="date" value="<?= $person->doj; ?>" name="doj" id="doj" class="form-control">
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>