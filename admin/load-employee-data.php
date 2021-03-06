<?php

  include "../DB_Connect.php";

  $response = array(
    "employee_name" => "",
    "jobTitle" => "",
    "email" => "",
    "phone" => "",
    "image" => ""
  );
  
  if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    global $con;

    $query = "SELECT * FROM employee WHERE id = :id";
    $stmt = $con->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    if( $stmt->rowCount() > 0 ) {
      $result = $stmt->fetch();
      $response['employee_name'] = $result['name'];
      $response['jobTitle'] = $result['job_title'];
      $response['email'] = $result['email'];
      $response['phone'] = $result['phone'];
      $response['image'] = $result['img'];

    }
  }

  echo json_encode($response);


?>
