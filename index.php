<?php
session_start();
require 'db.php';

$check= $_SESSION['email'];
$check1=$_SESSION['password'];
if($check== true && $check1== true)
{

}
else
{
  // $messg = 'Invalid Username and Password';
  // echo "$messg";
  header("Location: signin.php");
}




$sql = 'SELECT * FROM employee';
$statement = $conn->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2> EMPLOYEES DETAIL</h2>
    </div>
    <div class="card-body">


    <a href="logout.php" class="btn btn-info">logout</a>



      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>EMAIL</th>
          <th>SALARY</th>
          <th>AGE</th>
          <th>QUALIFICATION</th>
          <th>DOB</th>
          <th>DOJ</th> 
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->salary; ?></td>
            <td><?= $person->age; ?></td>
            <td><?= $person->qualification; ?></td>
            <td><?= $person->dob; ?></td>
            <td><?= $person->doj; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>




    

