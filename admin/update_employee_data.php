<?php

  include "Classes/Employee.php";

  $status = array(
    "message" => "error"
  );

  //check if i got the post request
  if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['jobTitle']) &&
  isset($_POST['email']) && isset($_POST['phone'])){

        $name = $_POST['name'];
        $jobTitle = $_POST['jobTitle'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        $imageName='';
    
      if(!empty($_FILES['employee_image']['name'])) {
        $employee_image = $_FILES['employee_image'];
        $imageName = rand(0, 100000) . "_" . str_replace(" ", "_", $name) . ".png";
        move_uploaded_file($employee_image['tmp_name'], "images/" . $imageName);
      }


    $employee_manager = new employeeManager();

    
    $employee = array(
        "name" => $name,
        "jobTitle" => $jobTitle,
        "email" => $email,
        "phone" => $phone,
        "id" => $id,
        "img" => $imageName
      );
      
      $status['message'] = $employee_manager->updateEmployee($employee);
    }
  
  echo json_encode($status);


?>