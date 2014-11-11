<?php include('include/header.php');?>
    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://www.uctlbg.co.za/flats1.php">Home</a></li>
          
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Liesbeeck Gardens(Alpha)</h3>
      </div>

      <hr>

<?php

    $rumNum = $_POST['id'];
    $studNum = $_POST['student_number'];
    $mobNum = $_POST['mobile_number'];
    $gender = $_POST['gender'];

/*    $rumNum = "123B";
    $studNum = "tsttha034";
    $mobNum = "0832746573";
    $gender = "Male";*/



    date_default_timezone_set('Africa/Johannesburg');
    $date = date('Y/m/d H:i:s');

    $data = array('room_number'=>$rumNum, 'student_number'=>$studNum,'mobile_number'=>$mobNum, 'email_address'=>$studNum.'@myuct.ac.za','gender'=>$gender, 'date_of_application'=>$date);
    
    try{
        echo "Before try";
         require '../config/dbconnect.php';

        $stmt = $db->prepare('INSERT INTO '. $table_name_applications. '(room_number,student_number, mobile_number, email_address, gender, date_of_application) 
                                            VALUES(:room_number,:student_number, :mobile_number, :email_address, :gender,:date_of_application)');
        echo "below stmt";
        $db->beginTransaction();

        $stmt->execute(array_values($data));

        //end transaction
        $db->commit();        

    }catch(PDOException $ex){
            echo "Error inserting values \n";
            echo $ex->getMessage();
            echo "\n";
            exit();
        }
 echo "Before Exit";
    //exit;



/*
* Inserting data into tables
*/

 // $sql = "UPDATE $table_name_flat
 //         SET student_number = '$studNum', mobile_number = '$mobNum'
 //         WHERE flat_id = '$id'"; 
    //the other null value is the email address

  mysql_close($con);

?>


      <div class="jumbotron">
        <p class="lead">Thank you! You will receive your reply via sms or email</p>

        <a class="btn btn-large btn-success" href="./">Exit</a>

      </div>

<?php include 'include/footer.php';?>
