<?php

#get groups to display on view groups
require("authenticate_visitor.php");

  $conn = oci_connect("guest", "guest", "xe")
    or die("<br>Couldn't connect");

  //get user name to only fetch reviews you own
  $fxn = "begin :r := shallowbugspack.get_user_name(:id); end;";
  $stmt = oci_parse($conn, $fxn);
  oci_bind_by_name($stmt, ':id', $user_id);
  oci_bind_by_name($stmt, ':r', $user_name);
  oci_execute($stmt);

  echo "Hello ".$user_name."! ";
  echo "Here are the groups you are currently in.";

  $query = "SELECT g.NAME, g.DETAIL
            FROM GROUPS g, users_groups_junction u
            WHERE u.group_id=g.id
            AND u.USER_ID=$user_id";
  $array = oci_parse($conn, $query);
  oci_execute($array);

  echo '<table class="table table-striped table-bordered table-hover highlight">'; 
  echo "<thead><tr><th>Group Name</th><th>Description</th></tr></thead>";
  while($row=oci_fetch_array($array)){
    echo "<tr><td>"; 
    echo $row['NAME'];
    echo "</td><td>";   
    echo $row['DETAIL'];
    echo "</td></tr>";    
  }

  oci_close($conn);
?>