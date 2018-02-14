<?php
    $con = mysqli_connect("localhost", "id4738482_cainam", "12345678", "id4738482_foodfastadb");

    if (!$con) {
      echo "No Connection";
    }else{
      
      $username = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      $statement = mysqli_prepare($con, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      mysqli_stmt_bind_param($statement, "sss", $username, $email, $password);
      mysqli_stmt_execute($statement);

      $response = array();
      $response["success"] = true;

      echo json_encode($response);
    }

?>
