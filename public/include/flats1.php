<?php include('include/header.php');?>

<?php
  require '../config/connectdb_client.php';

  $init_num_rows = 0;
  $init_num_cols = 10;
  $array = array();
  $array_index = 0;

    try{
        require '../config/dbconnect.php';
        $statement = $db->prepare("SELECT room_number FROM $table_name_flats;");
        $statement->execute();

        /* Fetch all of the remaining rows in the result set */

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $arr_results = array_values($results);

        foreach ($arr_results as $key) {
          echo $key['room_number'];
          $array[$array_index] = $key['room_number'];
          $array_index++;
        }

          try{
                $sql = "SELECT COUNT(*) FROM $table_name_flats"; 
                $result_num_roms = $db->prepare($sql); 
                $result_num_roms->execute(); 
                $init_num_rows = (int)$result_num_roms->fetchColumn(); 

                echo $init_num_rows;
          }
          catch(PDOException $ex){
            echo $ex->getMessage();
          }

    }catch(PDOException $ex){
        echo "Error fetching results";
        echo $ex->getMessage();
        exit;
    }

mysql_close($con);
?>

<div class="container-narrow">
<table class="table table-striped table-hover">    
      <thead>
        <tr>
            <h4>Availabe flats(room) in first floor.</h4>
        </tr>
      </thead>
      <tbody>
<?php
$rows = ($init_num_rows/10)+1; // define number of rows
$cols = $init_num_cols;// define number of columns
 
$array_index = 0;
for($tr=1;$tr<=$rows;$tr++){

  echo sizeof($array);
      
    echo "<tr>";
        for($td=1;$td<=$cols;$td++){
          if($array_index > sizeof($array)){
              break;
            }

          echo "<td><a href="."'./room.php?id="."$array[$array_index]'".">".$array[$array_index]."</a></td>";
          $array_index++;
        }
    echo "</tr>";
}
?>       

      </tbody>
    </table>

  <p style="text-align: center"> Go to: <a href="http://www.uctlbg.co.za/flats2.php">2nd floor</a> | <a href="http://www.uctlbg.co.za/flats3.php">3rd Floor</a> | <a href="http://www.uctlbg.co.za/flats4.php">4th floor</a> | <a href="http://www.uctlbg.co.za/flats5.php">5th Floor</a> | <a href="http://www.uctlbg.co.za/flats6.php">6th Floor</a> </p>  

<?php include 'include/footer.php';?>