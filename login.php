<?php
    $con = mysqli_connect("localhost", "id4738482_cainam", "12345678", "id4738482_foodfastadb");

    if (!$con) {
      echo "No Connection";
    }else{
      
      $email = $_POST["email"];
      $password = $_POST["password"];

      $statement = mysqli_prepare($con, "SELECT * FROM users WHERE email = ? AND password = ?");
      mysqli_stmt_bind_param($statement, "ss", $email, $password);
      mysqli_stmt_execute($statement);

      mysqli_stmt_store_result($statement);
      mysqli_stmt_bind_result($statement, $id, $username, $email, $password);

      $response = array();
      $response["success"] = false;

      while(mysqli_stmt_fetch($statement)){
          $response["success"] = true;
          $response["username"] = $username;
          $response["email"] = $email;
          $response["password"] = $password;
      }

      echo json_encode($response);
    }

?>
