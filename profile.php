<?php session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.php");
}

?>

<!docktype HTML>

<html>
<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Twitter</a>
        </div>
      </div>
    </nav>

    <div class="profile">

        <div class="profileInfo">
            <div id="profilePic" style="margin-top: 10px" class="row">
                <div class="profile-header-container">
                    <div class="profile-header-img">
                        <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
                        <!-- badge -->
                        <div class="rank-label-container">
                            <span class="label label-default rank-label">
                              <?php
                                include 'connect.php';
                                $id = $_SESSION['id'];
                                $selectUserName = "select username from t142359v3_users where id='$id';";
                                $result = mysqli_query($connect, $selectUserName);
                                if ($result->num_rows > 0) {
                                // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                      echo $row["username"];
                                  };
                                }
                              ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="profileControl">
                <a href="logout.php">Logout</a>
<!--<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image" />
  <input type="submit" value="upload" name="upload" />
</form>-->


                <form action="saveAboutMe.php" role="form" method="post">
                  <textarea name="about" class="form-control"></textarea>
                  <input type="submit" value="save" />
                </form>

                <div id="about" style="height: 100px; width: 200px; overflow-wrap: break-word; display:inline-block">
                  <?php
                  include 'connect.php';

                  $id = $_SESSION['id'];
                  $selectUserName = "select about from t142359v3_users where id='$id';";
                  $result = mysqli_query($connect, $selectUserName);
                  if ($result->num_rows > 0) {
                  // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo $row["about"];
                    };
                  }

                   ?>
                </div>
            </div>

        </div>

        <div class="tweets" style="height: 500px">
          <form action="tweet.php" role="form" method="post">
            <textarea name="tweet" class="form-control" style="max-width: 100%; min-width: 100%; max-height:100px;min-height:100px " required></textarea>
            <input type="submit" class="btn btn-info" value="TWEET" />
          </form>

          <table>
              <?php
              include 'connect.php';
              $user_id = $_SESSION['id'];
              $query = "SELECT tweet FROM t142359v2_tweet where user_id='$user_id' order by insert_date DESC limit 3;";

            	if($connect->multi_query($query))
            	{
            		do{
            			$result = $connect->store_result();

            			$finfo = $result->fetch_fields();
            			echo "<table class='table table-hover' style='max-width: 100%; min-width: 100%; max-height:100px;min-height:100px; text-align: center;table-layout: fixed'>";

            			while($row = $result->fetch_assoc())
            			{
            				echo "<tr>";
            				foreach($row as $v)
            				{
            					echo "<td style='word-wrap:break-word'>".$v."</td>";
            				}
            				echo "</tr>";
            			}
            			echo "</table>";
            		}while($connect->more_results() && $connect->next_result());
            	}


               ?>
          </table>
        </div>

        <div class="following">
          <form method="post" style="margin-top: 10px">
            <input type="text" name="search" />
            <input type="submit" name="submit" value="Search"/>
          </form>

          <div style="overflow-wrap: break-word; height: 300px; width: 150px; display:inline-block">
            <?php
            if (isset($_POST['submit'])) {
              include 'connect.php';
              $user = $connect -> real_escape_string($_POST['search']);

              $result = $connect->query("SELECT username, about from t142359v3_users where username='$user' ");

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo $row['username'];
                  echo "<br>";
                  echo "<br>";
                  echo $row['about'];
                }
              } else {
                echo "No users!";
              }
            }
          ?>
          </div>


        </div>

    </div>
</body>


</html>
