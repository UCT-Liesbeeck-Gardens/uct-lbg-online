<?php
	require 'dbconnect.php';


    $stmt = $db->query("SHOW DATABASES LIKE '$dbname'");
    $row_count = $stmt->rowCount();

    echo "\n";

	
    try{

        if($row_count == 0){
            $stmt = $db->query("CREATE DATABASE IF NOT EXISTS $dbname");

            echo "database created successfully \n";
            $db->query("USE $dbname");
        }
        else{
            echo "\n";
            echo "$dbname database exists \n\n";
            echo "Delete database? | Type Yes or No to continue \n";
            $handle = fopen("php://stdin","r");
            $line = fgets($handle);

            if(trim($line) != 'Yes'){
                echo "Aborting...!\n";
            exit;
            }
            echo "\n";

              $stmt = $db->query("DROP DATABASE IF EXISTS $dbname");
              $stmt = $db->query("CREATE DATABASE $dbname");
            
        }

    }catch(PDOException $ex){
        echo"Some error occured \n";
        echo $ex->getMessage();
        echo "/n";
    }




        echo "Created database successfully \n";


/*
* Creating tables for LBG room allocation
*/

    try{
        require 'dbconnect.php';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name_flats(
                    flat_id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    flat_number VARCHAR(50) NOT NULL,
                    room_number VARCHAR(50) NOT NULL,
                    flat_type VARCHAR(50) NOT NULL,
                    additional_info VARCHAR(250) NOT NULL
                );";
        $db->exec($sql);
        echo "Created $table_name_flats table. \n";

        $sql = "CREATE TABLE IF NOT EXISTS $table_name_applications(
                    flat_id_application INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                    flat_number VARCHAR(50) NOT NULL,
                    room_number VARCHAR(50) NOT NULL,
                    student_number VARCHAR(50) NOT NULL,
                    mobile_number VARCHAR(20) NOT NULL,
                    email_address VARCHAR(50) NOT NULL
                );";
        $db->exec($sql);
        echo "Created $table_name_applications table. \n";    

        $sql = "CREATE TABLE IF NOT EXISTS $$table_name_admins(
                    lbg_user_id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    lbg_username VARCHAR(50) NOT NULL default '',
                    lbg_password VARCHAR(50) NOT NULL default ''
                );";
        $db->exec($sql);
        echo "Created $table_name_admins table. \n";    
        
    }catch(PDOException $ex){
        echo "Error creating tables";
        echo $ex->getMessage();
        echo "\n";
        exit;
    }

    echo "Done creating tables \n \n";

    exit;


    //Inserting temp db data        
    $sql = "INSERT INTO $table_name_members VALUES(1, 'thapelo', 'thapelo4071')";
    mysql_query($sql) or die("Error inserting values \n".mysql_error()); 

/*
* Inserting sample data into db for testing.
*/

	$sql = "INSERT INTO $table_name_flat(flat_id, room_number, additional_info, student_number, mobile_number)
			VALUES
                ('101A','101A','','',''),
                ('101B','101B','','',''),
                ('102A','102A','','',''),
                ('102B','102B','','',''),
                ('103A','103A','','',''),
                ('103B','103B','','',''),
                ('103C','103C','','',''),
                ('104A','104A','','',''),
                ('104B','104B','','',''),
                ('105A','105A','','',''),

                ('105B','105B','','',''),
                ('106A','106A','','',''),
                ('106B','106B','','',''),
                ('107A','107A','','',''),
                ('107B','107B','','',''),
                ('108A','108A','','',''),
                ('108B','108B','','',''),
                ('109A','109A','','',''),
                ('109B','109B','','',''),
                ('109C','109C','','',''),

                ('110A','110A','','',''),
                ('110B','110B','','',''),
                ('111A','111A','','',''),
                ('111B','111B','','',''),
                ('111C','111C','','',''),
                ('112A','112A','','',''),
                ('112B','112B','','',''),
                ('113A','113A','','',''),
                ('113B','113B','','',''),
                ('113C','113C','','',''),

                ('114','114','','',''),
                ('115','115','','',''),
                ('116A','116A','','',''),
                ('116B','116B','','',''),
                ('116C','116C','','',''),
                ('116D','116D','','',''),
                ('117A','117A','','',''),
                ('117B','117B','','',''),
                ('117C','117C','','',''),
                ('117D','117D','','',''),

                ('118','118','','',''),
                ('119','119','','',''),
                ('120','120','','',''),
                ('121','121','','',''),
                ('122','122','','',''),
                ('123','123','','',''),
                ('124A','124A','','',''),
                ('124B','124B','','',''),
                ('125A','125A','','',''),
                ('125B','125B','','',''),

                ('126A','126A','','',''),
                ('126B','126B','','',''),
                ('127A','127A','','',''),
                ('127B','127B','','',''),
                ('128A','128A','','',''),
                ('128B','128B','','',''),
                ('129A','129A','','',''),
                ('129B','129B','','',''),
                ('130A','130A','','',''),
                ('130B','130B','','',''),

                ('131A','131A','','',''),
                ('131B','131B','','',''),
                ('132','132','','',''),
                ('133','133','','',''),
                ('134','134','','',''),
                ('135','135','','',''),
                ('136A','136A','','',''),
                ('136B','136B','','',''),

                ('201A','201A', '','',''),
                ('201B','201B', '','',''),
                ('202A','202A', '','',''),
                ('202B','202B', '','',''),
                ('203A','203A', '','',''),
                ('203B','203B', '','',''),
                ('203C','203C', '','',''),
                ('204A','204A', '','',''),
                ('204B','204B', '','',''),
                ('205A','205A', '','',''),

                ('205B','205B', '','',''),
                ('206A','206A', '','',''),
                ('206B','206B', '','',''),
                ('207A','207A', '','',''),
                ('207B','207B', '','',''),
                ('208A','208A', '','',''),
                ('208B','208B', '','',''),
                ('209A','209A', '','',''),
                ('209B','209B', '','',''),
                ('209C','209C', '','',''),

                ('210A','210A', '','',''),
                ('210B','210B', '','',''),
                ('211A','211A', '','',''),
                ('211B','211B', '','',''),
                ('212A','212A', '','',''),
                ('212B','212B', '','',''),
                ('213A','213A', '','',''),
                ('213B','213B', '','',''),
                ('213C','213C', '','',''),
                ('214A','214A', '','',''),

                ('214B','214B', '','',''),
                ('214C','214C', '','',''),
                ('214D','214D', '','',''),
                ('215A','215A', '','',''),
                ('215B','215B', '','',''),
                ('215C','215C', '','',''),
                ('116', 'KAMW', '','',''),
                ('217A','217A', '','',''),
                ('217B','217B', '','',''),
                ('217C','217C', '','',''),

                ('217D','217D', '','',''),
                ('218','Stud', '','',''),
                ('219A','219A', '','',''),
                ('219B','219B', '','',''),
                ('220','220', '','',''),
                ('221','221', '','',''),
                ('222','222', '','',''),
                ('223','223', '','',''),
                ('224','224', '','',''),
                ('225','225', '','',''),
                ('226','226', '','',''),
                ('227','227', '','',''),
                ('228','228', '','',''),
                ('229','229', '','',''),
                ('230','230', '','',''),
                ('231','231', '','',''),
                ('232','232', '','',''),
                ('233','233', '','',''),
                ('234','234', '','',''),
                ('235','235', '','',''),
                ('236','236', '','',''),
                ('237A','237A', '','',''),
                ('237B','237B', '','',''),
                ('238','238', '','',''),
                ('239','239', '','',''),
                ('240','240', '','',''),
                ('241','241', '','',''),
                ('242A','242A', '','',''),
                ('242B','242B', '','',''),
##3rd Floor
                ('301A','301A', '','',''),
                ('301B','301B', '','',''),
                ('301C','301C', '','',''),
                ('302A','302A', '','',''),
                ('302B','302B', '','',''),
                ('303A','303A', '','',''),
                ('303B','303B', '','',''),
                ('304A','304A', '','',''),
                ('304B','304B', '','',''),
                ('305A','305A', '','',''),
                ('305B','305B', '','',''),
                ('306A','306A', '','',''),
                ('306B','306B', '','',''),
                ('307A','307A', '','',''),
                ('307B','307B', '','',''),
                ('308A','308A', '','',''),
                ('308B','308B', '','',''),
                ('309A','309A', '','',''),
                ('309B','309B', '','',''),
                ('309C','309C', '','',''),
                ('310A','310A', '','',''),
                ('310B','310B', '','',''),
                ('311A','311A', '','',''),
                ('311B','311B', '','',''),
                ('312A','312A', '','',''),
                ('312B','312B', '','',''),
                ('313A','313A', '','',''),
                ('313B','313B', '','',''),
                ('313C','313C', '','',''),
                ('314A','314A', '','',''),
                ('314B','314B', '','',''),
                ('314C','314C', '','',''),
                ('315D','314D', '','',''),
                ('315A','315A', '','',''),
                ('315B','315B', '','',''),
                ('316A','316A', '','',''),
                ('316B','316B', '','',''),
                ('316C','316C', '','',''),
                ('316D','316D', '','',''),
                ('317A','317A', '','',''),
                ('317B','317B', '','',''),
                ('317C','317C', '','',''),
                ('317D','317D', '','',''),
                ('318A','318A', '','',''),
                ('318B','318B', '','',''),
                ('318C','318C', '','',''),
                ('318D','318D', '','',''),
                ('319A','319A', '','',''),
                ('319B','319B', '','',''),
                ('320','320', '','',''),
                ('321','321', '','',''),
                ('322','322', '','',''),
                ('323','323', '','',''),
                ('324A','324A', '','',''),
                ('324B','324B', '','',''),
                ('325A','325A', '','',''),
                ('325B','325B', '','',''),
                ('326A','326A', '','',''),
                ('326B','326B', '','',''),
                ('327A','327A', '','',''),
                ('327B','327B', '','',''),
                ('328A','328A', '','',''),
                ('328B','328B', '','',''),
                ('329A','329A', '','',''),
                ('329B','329B', '','',''),
                ('330A','330A', '','',''),
                ('330B','330B', '','',''),
                ('331A','331A', '','',''),
                ('331B','331B', '','',''),
                ('332','332', '','',''),
                ('333','333', '','',''),
                ('334','334', '','',''),
                ('335','335', '','',''),
                ('336A','336A', '','',''),
                ('336B','336B', '','',''),

##4th Floor
                ('401A','401A', '','',''),
                ('401B','401B', '','',''),
                ('402A','402A', '','',''),
                ('402B','402B', '','',''),
                ('403A','403A', '','',''),
                ('403B','403B', '','',''),
                ('404A','404A', '','',''),
                ('404B','404B', '','',''),
                ('405A','405A', '','',''),
                ('405B','405B', '','',''),

                ('405C','405C', '','',''),
                ('406A','406A', '','',''),
                ('406B','406B', '','',''),
                ('407A','407A', '','',''),
                ('407B','407B', '','',''),
                ('408A','408A', '','',''),
                ('408B','408B', '','',''),
                ('409A','409A', '','',''),
                ('409B','409B', '','',''),
                ('409C','409C', '','',''),

                ('410A','410A', '','',''),
                ('410B','410B', '','',''),
                ('411A','411A', '','',''),
                ('411B','411B', '','',''),
                ('412A','412A', '','',''),
                ('412B','412B', '','',''),
                ('413A','413A', '','',''),
                ('413B','413B', '','',''),
                ('414A','414A', '','',''),
                ('414B','414B', '','',''),

                ('414C','414C', '','',''),
                ('415D','414D', '','',''),
                ('415A','415A', '','',''),
                ('415B','415B', '','',''),
                ('416A','416A', '','',''),
                ('416B','416B', '','',''),
                ('416C','416C', '','',''),
                ('416D','416D', '','',''),
                ('417A','417A', '','',''),
                ('417B','417B', '','',''),

                ('417C','417C', '','',''),
                ('417D','417D', '','',''),
                ('418A','418A', '','',''),
                ('418B','418B', '','',''),
                ('418C','418C', '','',''),
                ('418D','418D', '','',''),
                ('419A','419A', '','',''),
                ('419B','419B', '','',''),
                ('420A','420A', '','',''),
                ('420B','420B', '','',''),

                ('421A','421A', '','',''),
                ('421B','421B', '','',''),
                ('421C','421C', '','',''),
                ('422','422', '','',''),
                ('423','423', '','',''),
                ('424','424', '','',''),
                ('425','425', '','',''),
                ('426','426', '','',''),
                ('427','427', '','',''),
                ('428','428', '','',''),

                ('429','429', '','',''),
                ('430','430', '','',''),
                ('431','431', '','',''),
                ('432','432', '','',''),
                ('433','433', '','',''),
                ('434','434', '','',''),
                ('435A','435A', '','',''),
                ('435B','435B', '','',''),
                ('436A','436A', '','',''),
                ('436B','436B', '','',''),

                ('437A','437A', '','',''),
                ('437B','437B', '','',''),
                ('437C','437C', '','',''),
                ('438A','438A', '','',''),
                ('438B','438B', '','',''),
##5th Floor
                ('501A','501A', '','',''),
                ('501B','501B', '','',''),
                ('502A','502A', '','',''),
                ('502B','502B', '','',''),
                ('503A','503A', '','',''),
                ('503B','503B', '','',''),
                ('503C','503C', '','',''),
                ('504A','504A', '','',''),
                ('504B','504B', '','',''),
                ('505A','505A', '','',''),

                ('505B','505B', '','',''),
                ('506A','506A', '','',''),
                ('506B','506B', '','',''),
                ('507A','507A', '','',''),
                ('507B','507B', '','',''),
                ('508A','508A', '','',''),
                ('508B','508B', '','',''),
                ('509A','509A', '','',''),
                ('509B','509B', '','',''),
                ('509C','509C', '','',''),

                ('510A','510A', '','',''),
                ('510B','510B', '','',''),
                ('511A','511A', '','',''),
                ('511B','511B', '','',''),
                ('512A','512A', '','',''),
                ('512B','512B', '','',''),
                ('513A','513A', '','',''),
                ('513B','513B', '','',''),
                ('514A','514A', '','',''),
                ('514B','514B', '','',''),

                ('514C','514C', '','',''),
                ('514D','514D', '','',''),
                ('515A','515A', '','',''),
                ('515B','515B', '','',''),
                ('515C','515C', '','',''),
                ('516A','516A', '','',''),
                ('516B','516B', '','',''),
                ('516C','516C', '','',''),
                ('516D','516D', '','',''),
                ('517A','517A', '','',''),

                ('517B','517B', '','',''),
                ('517C','517C', '','',''),
                ('517D','517D', '','',''),
                ('518A','518A', '','',''),
                ('518B','518B', '','',''),
                ('518C','518C', '','',''),
                ('518D','518D', '','',''),
                ('519A','519A', '','',''),
                ('519B','519B', '','',''),
                ('520A','520A', '','',''),

                ('520B','520B', '','',''),
                ('521A','521A', '','',''),
                ('521B','521B', '','',''),
                ('521C','521C', '','',''),
                ('522A','522A', '','',''),
                ('522B','522B', '','',''),
                ('523A','523A', '','',''),
                ('523B','523B', '','',''),
                ('524A','524A', '','',''),
                ('524B','524B', '','',''),

                ('525A','525A', '','',''),
                ('525B','525B', '','',''),
                ('526A','526A', '','',''),
                ('526B','526B', '','',''),
                ('527A','527A', '','',''),
                ('527B','527B', '','',''),
                ('528A','528A', '','',''),
                ('528B','528B', '','',''),
                ('529A','529A', '','',''),
                ('529B','529B', '','',''),

                ('530A','530A', '','',''),
                ('530B','530B', '','',''),
                ('531A','531A', '','',''),
                ('531B','531B', '','',''),
                ('532A','532A', '','',''),
                ('532B','532B', '','',''),

##6th Floor
                ('601A','601A', '','',''),
                ('601B','601B', '','',''),
                ('602A','602A', '','',''),
                ('602B','602B', '','',''),
                ('603A','603A', '','',''),
                ('603B','603B', '','',''),
                ('604A','604A', '','',''),
                ('604B','604B', '','',''),
                ('605A','605A', '','',''),
                ('605B','605B', '','',''),

                ('606A','606A', '','',''),
                ('606B','606B', '','',''),
                ('607A','607A', '','',''),
                ('607B','607B', '','',''),
                ('608A','608A', '','',''),
                ('608B','608B', '','',''),
                ('609A','609A', '','',''),
                ('609B','609B', '','',''),
                ('609C','609C', '','',''),

                ('610A','610A', '','',''),
                ('610B','610B', '','',''),
                ('611A','611A', '','',''),
                ('611B','611B', '','',''),
                ('611C','611C', '','',''),
                ('612A','612A', '','',''),
                ('612B','612B', '','',''),
                ('613A','613A', '','',''),
                ('613B','613B', '','',''),
                ('614A','614A', '','',''),

                ('614B','614B', '','',''),
                ('614C','614C', '','',''),
                ('614D','614D', '','',''),
                ('615A','615A', '','',''),
                ('615B','615B', '','',''),
                ('615C','615C', '','',''),
                ('616A','616A', '','',''),
                ('616B','616B', '','',''),
                ('616C','616C', '','',''),
                ('616D','616D', '','',''),

                ('617A','617A', '','',''),
                ('617B','617B', '','',''),
                ('617C','617C', '','',''),
                ('617D','617D', '','',''),
                ('618A','618A', '','',''),
                ('618B','618B', '','',''),
                ('618C','618C', '','',''),
                ('618D','618D', '','',''),
                ('619A','619A', '','',''),
                ('619B','619B', '','',''),

                ('620A','620A', '','',''),
                ('620B','620B', '','',''),
                ('620C','620C', '','',''),
                ('621A','621A', '','',''),
                ('621B','621B', '','',''),
                ('621C','621C', '','',''),
                ('622A','622A', '','',''),
                ('622B','622B', '','',''),
                ('623','623', '','',''),
                ('624','624', '','',''),

                ('625','625', '','',''),
                ('626','626', '','',''),
                ('627','627', '','',''),
                ('628','628', '','',''),
                ('629','629', '','',''),
                ('630','630', '','',''),
                ('631','631', '','',''),
                ('632','632', '','',''),
                ('633','633', '','',''),
                ('634','634', '','',''),

                ('635A','635A', '','',''),
                ('635B','635B', '','',''),
                ('636A','636A', '','',''),
                ('636B','636B', '','',''),
                ('637A','637A', '','',''),
                ('637B','637B', '','',''),
                ('638A','638A', '','',''),
                ('638B','638B', '','','')";	

	mysql_query($sql) or die("Error inserting values \n".mysql_error()); 
    echo "Done inserting values \n";

	mysql_close($con);
?>

