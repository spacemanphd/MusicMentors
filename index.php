<?php

require_once('db_config.php');
require_once('display_page.inc.php');

if (isset($_POST['Logout']))
{
	if (session_status() == PHP_SESSION_ACTIVE)
	{
		session_destroy();
		session_abort();
	}
	unset($_POST['Logout']);
}

if (isset($_POST["username"]) && isset($_POST["password"]))
{
	attemptLogin();
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 11</title>

    <!-- Bootstrap core CSS  -->
    <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

  </head>
<body>

<div class="container">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         <div id="login">
            <div class="page-header">
               <h2>Login</h2>
            </div>
            <?php
            	if (isset($_SESSION['username']))
				{
					echo "<h1>Hello, ".$_SESSION['username']."</h1>";
					echo '<form role="form" method="post">
					<button name="Logout" class="btn btn-primary">Logout</button>
					</form>';
				}
				else
				{
					if (!isset($_GET['page']) || $_GET['page'] == "login")
						outputLoginForm();
					else if ($_GET['page'] == "register")
						outputRegisterForm();
				}
            ?>
         </div>
      </div>
      <div class="col-md-3">
      </div>
   </div>
</div>  <!-- end container -->

</body>
</html>