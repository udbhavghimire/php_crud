<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Student Details</title>
</head>
<body>
<div class="container">

<?php

      include_once 'dbconn.php'; 

      if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];

        $select = "SELECT * FROM studentinfo WHERE id = $edit_id ";

         $run = mysqli_query($conn,$select);
         $row_student = mysqli_fetch_array($run);

          $name = $row_student['name'];
          $age = $row_student['age'];
          $contact = $row_student['contact'];
          $gender = $row_student['gender'];
          $percentage = $row_student['percentage'];
          $division = $row_student['division'];
          $image = $row_student['image'];
          
      }
  ?>


<form action="" method="post" enctype= "multipart/form-data">
      <h1 class="text-center py-5"> Add details of the Studnet</h1>
      
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control" value = "<?php echo $name; ?>" >
        </div>

        <div class="mb-3">
            <label class="form-label text">Age</label>
            <input type="number" name="age" class="form-control" value = "<?php echo $age; ?>" >
        </div>
        
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="number" name="contact" class="form-control" value = "<?php echo $contact; ?>" >
        </div>

        <div class="py-3">
        <label class="form-label">Gender &nbsp;&nbsp;</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value = "<?php echo $gender; ?>" >
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value = "<?php echo $gender; ?>" >
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value = "<?php echo $gender; ?>" >
                <label class="form-check-label" for="inlineRadio3">Others</label>
            </div>  
        </div>

        <div class="mb-3">
            <label class="form-label">Percentage</label>
            <input type="float" name="percentage" class="form-control" value = "<?php echo $percentage; ?>" >
        </div>

        <div class="mb-3">
            <label class="form-label">Division</label>
            <input type="text" class="form-control" name="division" value = "<?php echo $division; ?>" >
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" name="insert-btn" class="btn btn-success">Submit</button>
</form>


<?php

include_once 'dbconn.php'; 

if(isset($_POST['insert-btn'])){

  $e_name = $_POST['name'];
  $e_age = $_POST['age'];
  $e_contact = $_POST['contact'];
  $e_gender = $_POST['gender'];
  $e_percentage = $_POST['percentage'];
  $e_division = $_POST['division'];
  $e_image = $_FILES['image']['name'];
  $etmp_name = $_FILES['image']['tmp_name'];


  if(empty($e_image)){
      $e_image = $image;
  }

 $update = "UPDATE studentinfo SET name='$e_name',age='$e_age',contact='$e_contact',gender='$e_gender',percentage='$e_percentage',division='$e_division',image='$e_image' WHERE id='$edit_id' ";

  $run_update = mysqli_query($conn, $update);

  if($run_update == true){
      echo "data updated";
      move_uploaded_file($temp_name,"uploads/$e_image");
      header("Location: index.php");

  }else{
      echo "update failed";
  }

}


?>



</div>
 
</body>
</html>