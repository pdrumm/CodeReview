<?php

  $conn = oci_connect("guest", "guest")
  or die ("<br>Couldn't connect");

  $input_name = $_POST["username"];
  $input_pass = $_POST["password"];

  //Error if fields are blank
  if ($input_name === "" || $input_pass == ""){
      echo "All fields required";
      exit -1;
  }

  $query = "select salt, password from users where user_name='$input_name'";
  $stmt = oci_parse($conn, $query);
  //store table results into variable
  oci_define_by_name($stmt, 'PASSWORD', $pass);
  oci_define_by_name($stmt, 'SALT', $salt);
  oci_execute($stmt);
  oci_fetch($stmt);

  //hash provided password and compare with DB
  //
  $hash = hash("sha256", $input_pass . $salt);

  //compare input pass and hashed pass
  if ($pass === $hash){
      //If the login was successful
      header('Location: clone.php');//takes you to this page after running the script
  } else{
      print "LOGIN FAILED. Please check username/password combination";
  }

?>