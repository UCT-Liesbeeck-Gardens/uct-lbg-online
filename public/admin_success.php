
<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
    header("Refresh: 2; url=http://localhost:8095/bootstraplive/docs/uct-lbg-online/public/signin.php");
    exit();

}
else
{
    try
    {
      require '../config/dbconnect.php';
        /*** prepare the insert ***/
        $stmt = $db->prepare("SELECT lbg_username FROM $table_name_admins 
        WHERE lbg_user_id = :lbg_user_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':lbg_user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $lbg_username = $stmt->fetchColumn();


        /*** if we have no something is wrong ***/
        if($lbg_username == false)
        {
            $message = 'Access Error';
            print $lbg_username;
         header("Location: ./signin.php");
         exit();
        }
        else
        {
            $message = 'Welcome '.$lbg_username;
        }
    }
    catch (Exception $ex)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = "We are unable to process your request. Please try again later".$ex->getMessage();
         echo $ex->getMessage();
         header("Location: ./signin.php");
         exit();
    }
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Liesbeeck Gardens &middot; Room allocation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>









  <body>

    <?php
      echo "$message";
      echo "$lbg_username";
    ?>

    <div class="container-narrow">


      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Liesbeeck Gardens(Alpha)</h3>
      </div>

  <p>Flat/room applications</p>
      <hr>

<p><a href="http:./admin_approvals.php">Approvals</a> | <a href="http:./admin_declines.php">Declines</a></p>

<table class="table table-striped table-hover">
      
    
      <thead>
        <tr>
            <th>Room#</th>
            <th>Student#</th>
            <th>Mobile#</th>
            <!-- th>Email</th> -->
            <th>Details</th>
        </tr>


      </thead>
      <tbody>
       
<?php
/*    while($row = mysql_fetch_array($result)){
      echo "<tr>";

      echo "<td>".$row['room_number']. "</td>";
      echo "<td>".$row['student_number']. "</td>";
      echo "<td>".$row['mobile_number']. "</td>";
      
      echo "<td><a href='./admin_details.php?id=".$row['room_number']."'> View </a></td>";

      echo "</tr>";
    }*/
mysql_close($con);
?>



      </tbody>
    </table>

    <hr>

      <div class="footer">
        <p><a style="float: right" href="http:./logout.php">Logout</a></p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>

  </body>
</html>
