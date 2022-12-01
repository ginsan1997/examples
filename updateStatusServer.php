<?php 
	include 'db.php'; 


    // error_reporting(0);
    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPing.php';
    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPingException.php';
    
    use xPaw\MinecraftPing;
    use xPaw\MinecraftPingException;

    // $sql = "SELECT * FROM `minecraft` ORDER BY RAND() LIMIT 5"; // Обновление 5 рандомных серверов из базы
    $sql = "SELECT * FROM `minecraft`";
    $res_data = mysqli_query($conn, $sql);

    if($res_data = mysqli_query($conn, $sql)){
        foreach($res_data as $row){
        $id = $row["id_server"];
          $nameserver =$row["nameserver"];
          $ipserver =$row["ipserver"];
          $portserver =$row["portserver"];
           $version =$row["version"];
          $votes = $row['votes'];
           $description =$row["description"];
             $banner =$row["banner"];
            $rating =$row["rating"];
            $playerOnline = $row['playerOnline'];
            $playerMax = $row['playerMax'];
            $status = $row['status'];
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
            
            for($i=0;$i<=23;$i++){
                $time = 'time'.$i;
                
                if (date('H')== $i){
                   
                    $sqlgraph = "UPDATE `minecraft` SET `$time` = '$playerOnline' WHERE `minecraft`.`ipserver` = '$ipserver'";
                    $conn->query($sqlgraph);     
                }
            }

         

        // Обращение в базу с голосами и чекнуть время когда проголосовал , айди сервера
            $sqlCheckTimeVote = "SELECT * FROM `votes`";
            $resCheckTimeVote = mysqli_query($conn, $sqlCheckTimeVote);
        foreach($resCheckTimeVote as $row){
            $idServerCheckTime = $row['id_server'];
            $timeVote = $row['timeVote'];
            $nowTime = time();
            $howLongVote = $nowTime - $timeVote;
        }

        // Обращение в базу с время жизни голоса и чекнуть время когда проголосовал , айди сервера
            $sqlCheckTimeVoteLife = "SELECT * FROM `deletevote`";
            $resCheckTimeVoteLife = mysqli_query($conn, $sqlCheckTimeVoteLife);
        foreach($resCheckTimeVoteLife as $row){
            $idServerCheckTimeLife = $row['id_server'];
            $timeVoteLife = $row['timeVote'];
            $nowTime = time();
            $howLongVoteLife = $nowTime - $timeVoteLife;
        }


            try
            {
                $Query = new MinecraftPing($ipserver, $portserver);
                $info = $Query->Query( );

                $status = '<div class="onlineGreen"> Онлайн </div>';          
                $playerOnline= $info['players']['online'];
                $playerMax = $info['players']['max'];
                // Место по баллам
                $sqlmesto = "UPDATE `minecraft` SET mesto = @num := @num + 1 where 0 in(select @num:=0) ORDER BY `minecraft`.`rating` DESC,`minecraft`.`status` DESC;";
                $conn->query($sqlmesto); 

                // Место по голосам
                $sqlmestoVote = "UPDATE `minecraft` SET mestoVote = @numVote := @numVote + 1 where 0 in(select @numVote:=0) ORDER BY `minecraft`.`votes` DESC, `minecraft`.`status` DESC;";
                $conn->query($sqlmestoVote); 

                // Место по среднему онлайну
                $sqlmestoMiddleOnline = "UPDATE `minecraft` SET mestoMiddleOnline = @numMiddleOnline := @numMiddleOnline + 1 where 0 in(select @numMiddleOnline:=0) ORDER BY `minecraft`.`middleOnline` DESC,`minecraft`.`status` DESC;";
                $conn->query($sqlmestoMiddleOnline); 

                // Место по  онлайну
                $sqlmestoOnline = "UPDATE `minecraft` SET mestoOnline = @numOnline := @numOnline + 1 where 0 in(select @numOnline:=0) ORDER BY `minecraft`.`playerOnline` DESC,`minecraft`.`status` DESC;";
                $conn->query($sqlmestoOnline); 

                $sqlupdate = "UPDATE `minecraft` SET `playerOnline` = '$playerOnline',`middleOnline` = '$middlePlayers',`playerMax` = '$playerMax', `status` = '$status' WHERE `minecraft`.`ipserver` = '$ipserver'";
                $conn->query($sqlupdate); 
                // Проверка на голоса сервера раз в сутки
                if ($howLongVote >= 86400) {
                   $sqlChangeVote = "DELETE FROM `votes` WHERE `id_server` = '$idServerCheckTime'";
                    $conn->query($sqlChangeVote); 
                }

                // Проверка на голоса сервера раз в 14 дней
                if ($howLongVoteLife >= 1209600) {
                   
                   $sqlIDLife = "SELECT * FROM `minecraft` WHERE `id_server` = '$idServerCheckTimeLife'";
                    $resLifeVote = mysqli_query($conn, $sqlIDLife);
                    foreach($resLifeVote as $row){
                         $votesMinus = $row["votes"];
                    }

                    $sqlNewVoteLife = "DELETE FROM `deletevote` WHERE `id_server` = '$idServerCheckTimeLife'";
                    mysqli_query($conn,  $sqlNewVoteLife);  
                    $minusVote = $votesMinus - 1; //Минус голос у сервера

                    $sqlupdateVoteLife = "UPDATE `minecraft` SET `votes` = '$minusVote' WHERE `minecraft`.`id_server` = '$idServerCheckTimeLife'";
                    mysqli_query($conn,  $sqlupdateVoteLife);
                    echo "Удалили голос у сервера" . $idServerCheckTimeLife ;
                }

                

                    


            }
            catch( MinecraftPingException $e )
            {
                $Exception = $e;
                $status = '<div class="offlineRed"> Оффлайн </div>';
                $playerOnline= $info['players']['online'];
                $playerMax = $info['players']['max'];
                $sqlmesto = "UPDATE `minecraft` SET mesto=@num:=@num+1 where 0 in(select @num:=0)";
                $conn->query($sqlmesto); 
                $sqlupdate = "UPDATE `minecraft` SET `playerOnline` = '0',`playerMax` = '0', `status` = '$status',`status` = '$status' WHERE `minecraft`.`ipserver` = '$ipserver'";
                $conn->query($sqlupdate);    

            }
        
            if( $Query !== null )
            {


                $Query->Close( );
            }

           
                }
            }
            
            mysqli_close($conn);

// }

  
