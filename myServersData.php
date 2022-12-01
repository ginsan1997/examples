<?php 

    include "db.php";
    session_start();
    if($_SESSION['logged_user']) { 
    $owner =  $_SESSION['logged_user']->login;
    
    $sql = "SELECT * FROM `minecraft` WHERE `minecraft`.`owner` = '$owner'";
    $res_data = mysqli_query($conn, $sql);

    if($res_data = mysqli_query($conn, $sql)){
        foreach($res_data as $row){
            $id = $row["id_server"];
          @$nameserver =$row["nameserver"];
          @$ipserver =$row["ipserver"];
          @ $portserver =$row["portserver"];
          @ $version =$row["version"];
          @  $votes = $row['votes'];
          @ $description =$row["description"];
          @   $banner =$row["banner"];
          @  $rating =$row["rating"];
          @  $playerOnline = $row['playerOnline'];
          @  $playerMax = $row['playerMax'];
          @  $status = $row['status'];
          @  $logo = $row['logo'];
          @ $banner = $row['banner'];
          @ $typeserver = $row['typeserver'];   
          $mesto = $row['mesto']; 
          @$time0 = $row['time0'];
          @ $time1 = $row['time1'];
          @$time2 = $row['time2'];
          @$time3 = $row['time3'];
          @$time4 = $row['time4'];
          @$time5 = $row['time5'];
          @$time6 = $row['time6'];
          @$time7 = $row['time7'];
          @$time8 = $row['time8'];
          @$time9 = $row['time9'];
          @$time10 = $row['time10'];
          @$time11 = $row['time11'];
          @ $time12 = $row['time12'];
          @$time13 = $row['time13'];
          @ $time14 = $row['time14'];
          @ $time15 = $row['time15'];
          @ $time16 = $row['time16'];
          @ $time17 = $row['time17'];
          @ $time18 = $row['time18'];
          @ $time19 = $row['time19'];
          @ $time20 = $row['time20'];
          @ $time21 = $row['time21'];
          @  $time22 = $row['time22'];
          @ $time23 = $row['time23']; 
          $middlePlayers = ceil(($time0+$time1+$time2+$time3+$time4+$time5+$time6+$time7+$time8+$time9+$time10+$time11+$time12+$time13+$time14+$time15+$time16+$time17+$time18+$time19+$time20+$time21+$time22+$time23)/24);
          
          
          
          echo '<div class="serverBlockMyServer">
          <div class="NuminRating" id="NuminRating">'. $mesto.'</div>
        <div class="imgLogo"><img src="'. $logo.'" width="75px" alt=""></div>
        <div class="mainInfoServer">
        <a href = "../pageOwnserver.php?server='.$ipserver.'&port='.$portserver.'"> <div class="nameServerNew">'.$nameserver.'</div></a>
            <div class="onlineandMiddle">
                <div class="online">'.$playerOnline.'/'.$playerMax.'</div>
                <div class="maincollumn">'.$middlePlayers.'</div>
                <div class="maincollumn">'.$status.'</div>
                <div class="maincollumn">'.$typeserver.'</div>
                <div class="maincollumn">С магазином</div>
            </div>
        </div>

        <div class="aboutServer">
            <div class="votesandDonate">
                <div class="votes">'.$votes.'</div>
                <div class="donate">'.$rating.'</div>
            </div>
            <div class="typegameandVersion">
                <div class="type">Java</div>
                <div class="version">'.$version.'</div>
            </div>
        </div>

        <div class="ipserver">
            <div class="serverIPPORT">'.$ipserver.':'.$portserver.'</div>
        </div>

    </div>
    
    
    <div class="preAreaServer">
    <div class="preAreaMain">
    <div class="PrestatusServer">
        <div class="mainPreText">
       <div class="PretextServer"> <span class="spanPreTextServer">Статус: '.$status.'</span>  </div>
       <div class="PretextServer"> <span class="spanPreTextServer">Место в рейтинге: '. $mesto.'</span></div>
       <div class="PretextServer"> <span class="spanPreTextServer">Средний онлайн: '.$middlePlayers.'</span></div>
       <div class="PretextServer"><span class="spanPreTextServer">Количество голосов: '.$votes.'</span></div>
       <div class="preTagsServer"><span class="tagPreServers">1 2 3 тега</span></div>
        </div>
    </div>
   
<div class="PreRightBlock">
   
        <div class="graphAreaPreServer">
        <div class="preBlockGraph1">
            <div class="graph1"></div> <div class="PreOnline">Среднесуточный онлайн</div>
        </div>  
        <div class="preBlockGraph2">
            <div class="graph2"></div><div class="PreMesto">Место в рейтинге</div>
        </div>
    </div>  
</div>
    </div>
</div>

';

        }
        if ($row['owner'] == ''){
            echo 'У вас нет серверов';
        }
    }


    mysqli_close($conn);
    }
?>