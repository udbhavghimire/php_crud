<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Student</title>
</head>
<body>
<div class="container">
  <form action="" method="post" enctype= "multipart/form-data">
      <h1 class="text-center py-5"> Add details of the Studnet</h1>
      
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label text">Age</label>
            <input type="number" name="age" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="number" name="contact" class="form-control">
        </div>

        <div class="py-3">
        <label class="form-label">Gender &nbsp;&nbsp;</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="others" >
                <label class="form-check-label" for="inlineRadio3">Others</label>
            </div>  
        </div>

        <div class="mb-3">
            <label class="form-label">Percentage</label>
            <input type="float" name="percentage" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Division</label>
            <input type="text" class="form-control" name="division">
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

    $name = $_POST['name'];
    $age= $_POST['age'];
    $contact= $_POST['contact'];
    $gender= $_POST['gender'];
    $percentage= $_POST['percentage'];
    $division= $_POST['division'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    
    $insert = "INSERT INTO studentinfo (name, age, contact, gender, percentage, division, image) VALUES ('$name','$age','$contact','$gender','$percentage','$division','$image')";

    $run_insert = mysqli_query($conn, $insert);

    if($run_insert == true){
        echo "data inserted";
        move_uploaded_file($tmp_name,"uploads/$image");
        header("Location: index.php");
    }else{
        echo "insertion failed";
    }

}
    




?>
 
</body>
</html>