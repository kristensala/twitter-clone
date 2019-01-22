<?php session_start();

/* kui kasutaja on sisse logitud
siis ei saa index.php lehele minna,
ennem peab valja logima
*/
if(isset($_SESSION['id'])) {
  header("Location: profile.php");
}

?>

<!docktype HTML>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Twitter</a>
        </div>

        <form action="login.php" id="signin" class="navbar-form navbar-right" role="form" method="post">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="username" type="username" class="form-control" name="username" value="" placeholder="Username" required="">
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password" required="">
            </div>

            <button type="submit" class="btn btn-info">LOGIN</button>
        </form>
      </div>
    </nav>

    <div id="sign_upForm" class="container">
        <div class="row centered-form">
          <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          	<div class="panel panel-default">
          		<div class="panel-heading">
  			    		<h3 class="panel-title">Sign up for Twitter</h3>
  			 			</div>

              <div class="panel-body">
  			    		<form action="register.php" role="form" method="post">
                  <div class="form-group">
                       <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" required="">
                  </div>

  			    			<div class="form-group">
  			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required="">
  			    			</div>

                  <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required="">
                  </div>
                  <button type="submit" class="btn btn-info">REGISTER</button>

  			    		</form>
  			    	</div>
  	    		</div>
    		</div>
    	</div>
    </div>
</body>


</html>
