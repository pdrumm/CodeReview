<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title> Group 2 Code Review Project</title>
	
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>

  </head>
 

  <body class="valign-wrapper">



	<div class="valign container">
	  <h3> ADB Code Review Sign In<i>(Group 2)</i> </h3>
      
	  <form id="SignIn" action="./authenticate.php" method="POST">
        <label>User Name</label>
        <input name="username" type="text" size="25" />

        <label>Password:</label>
        <input name="password" type="password" size="25" />

        <input name="mySubmit" type="submit" value="Log In!" class="waves-effect waves-light btn" />
      </form>


      <p>Don't have an account? </p>
      <a href="./signup.html"> Sign up here </a>
    </div>

  </body>

  <style>
  html {
	width: 100%;
	height: 85%;
  }
  body {
	width: 100%;
	height: 100%;
  }
  </style>
  
</html>