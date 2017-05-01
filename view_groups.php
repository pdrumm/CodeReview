<!DOCTYPE html>

<?php require("authenticate_visitor.php"); ?>

<html>

  <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    <?php
      $title = "Clone";
      include("head.php"); 
    ?>
    
  </head>

  <body onload="get_groups();">

    <?php include("navbar.php"); ?>

    <p> Create groups <a href=./groups.php> here </a></p>
    
    <script>
     function get_groups(){
        var request = $.ajax({
          url: "./get_groups.php",
          type: "POST",
          success: function(data){
            $('#resultDiv').html(data);
          }
        });
        
        request.fail(function(jqXHR, textStatus) {
          alert( "Request failed: " + textStatus );
        });
        
        return false;    
     }
      //need this to trigger modal opening
      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
          
     </script>
     <div id=resultDiv style="position: relative; left:50px"></div>
       <!-- Modal Structure -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Group Members</h4>
          <div class="modal-body">
            <p>A bunch of text</p>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
      </div>

     <script>
        $('#resultDiv').on('click', 'table tr', function() {
            //get the Group name on the table row we clicked on to pass to PHP script
            var $row = $(this).closest("tr"),
            $tds = $row.find("td:nth-child(1)");

            $.each($tds, function() {
                //below this the group name
                console.log($(this).text());
            });
        });
     </script>

  </body>