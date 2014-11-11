<?php include('include/header.php');?>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://www.uctlbg.co.za/flats1.php">Home</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Liesbeeck Gardens(Alpha)</h3>
      </div>

<?php
    $id = $_GET['id'];

    try{
        require '../config/dbconnect.php';
        $statement = $db->prepare("SELECT * FROM $table_name_flats WHERE room_number='$id';");
        $statement->execute();

        $results = $statement->fetch();


    }catch(PDOException $ex){
        echo "Error fetching results";
        echo $ex->getMessage();
        exit;
    }

mysql_close($con);
?>

      <hr>


<form class="form-signin" action="allocation_success.php" method="post">
        
      <div class="jumbotron">
        <h4>Room#: <?php echo $results['room_number']; ?>
        </h4>
        <p class="lead">Draw table based on who has occupered</p>


      </div>
           <p style="text-align: center">
            <label class="control-label col-xs-2">Student number</label>
        <input type="hidden" name = "id" value = <?php echo "$id" ?>>
        <input style="width:30%; text-align: center;" type="text" class="input-block-level" placeholder="Student number" name="student_number">
        </p>

        <p style="text-align: center">
          <label class="control-label col-xs-2">Mobile number</label>
        <input style="width:30%; text-align: center;" type="text" class="input-block-level"  placeholder="Mobile number" name="mobile_number">

       </p>

          <p style="text-align: center">
          <label class="control-label col-xs-2">Gender</label>
        <input style="width:30%; text-align: center;" type="text" class="input-block-level" placeholder="Gender" name="gender">
     

       <p style="text-align: center">
        <button class="btn btn-large btn-success" type="submit">Submit</button>

       </p>

      </form>

<?php include 'include/footer.php';?>

