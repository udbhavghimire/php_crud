<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>view details</title>
</head>
<body>
<div class=" container ">
    <div class="row">
        <div class="col-md-10">
        <h1 class="text-center py-5">Student Details</h1> 
        </div>
        <div class="col-md-2 py-5">
        <a href="add_student.php" class="btn btn-success float-end">Add Student</a>
        </div>
  

  </div>
  <table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>SN</th>
      <th>Name</th>
      <th>Age</th>
      <th>Contact</th>
      <th>Gender</th>
      <th>Percentage</th>
      <th>Division</th>
      <th>Image</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>

  <?php

include_once 'dbconn.php'; 

include_once 'delete.php';

$select = "SELECT * FROM studentinfo"; 

$run = mysqli_query($conn,$select);

while($row_student = mysqli_fetch_array($run)){
    $id = $row_student['id'];
    $name = $row_student['name'];
    $age = $row_student['age'];
    $contact = $row_student['contact'];
    $gender = $row_student['gender'];
    $percentage = $row_student['percentage'];
    $division = $row_student['division'];
    $image = $row_student['image'];

  ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $age; ?></td>
      <td><?php echo $contact; ?></td>
      <td><?php echo $gender; ?></td>
      <td><?php echo $percentage; ?></td>
      <td><?php echo $division; ?></td>
      <td><img src="uploads/<?php echo $image; ?>" height = "60px"></td>
      <td><a class="btn btn-danger" onclick="showConfirm()" href="index.php?del=<?php echo $id; ?>">Delete</a> </td>
      <td><a class="btn btn-outline-secondary" href="edit.php?edit=<?php echo $id; ?>">Edit</a> </td>
    </tr>
<?php  } ?>

  </tbody>
</table>


</div>
</body>
<script type="text/javascript">
    function showConfirm(){
        var confirmbox=confirm("Are you sure you want to delete the record?");
        if(!confirmbox){
            event.preventDefault();
        }
    }


</script>
</html>