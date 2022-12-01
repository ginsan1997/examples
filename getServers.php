<?php
	include 'db.php'; 
    // error_reporting(0);

    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPing.php';
    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPingException.php';
    
    use xPaw\MinecraftPing;
    use xPaw\MinecraftPingException;



    $sort_list = array(
        'online'   => '`playerOnline`',
        'rating'  => '`rating`',  
        'votes'  => '`votes`',  
        'maxOnline'  => '`playerMax`',  
        'middleOnline'  => '`middleOnline`',  
        
    );
           



    $sort = @$_GET['sort'];
        if (array_key_exists($sort, $sort_list)) {
            $sort_sql = mysqli_real_escape_string($conn,$sort_list[$sort]);
        } else {
            $sort_sql = reset($sort_list);
            mysqli_real_escape_string($conn,$sort_sql);
            }
    if ($sort) {

      @$sql = "SELECT * FROM `minecraft`  ORDER BY `minecraft`.{$sort_sql} DESC LIMIT 5 ";




        @$res_data = mysqli_query($conn, $sql);
        foreach($res_data as $row){
            @ $id = $row["id_server"];
            @ $nameserver =$row["nameserver"];
            @$ipserver =$row["ipserver"];
            @$portserver =$row["portserver"];
            @ $version =$row["version"];
            @ $description =$row["description"];
            @   $banner =$row["banner"];
            @  $rating =$row["rating"];
            @ $votes = $row['votes'];

           if ($sort_sql == "`rating`") { @$mesto = $row['mesto']; };
           if ($sort_sql == "`votes`") {@ $mesto = $row['mestoVote']; };
           if ($sort_sql == "`middleOnline`") {@ $mesto = $row['mestoMiddleOnline']; };
           if ($sort_sql == "`playerOnline`") {@ $mesto = $row['mestoOnline']; };

            @ $playerOnline = $row['playerOnline'];
            @  $playerMax = $row['playerMax'];
            @ $status = $row['status'];
            @ $logo = $row['logo'];
            @ $typeserver = $row['typeserver'];
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
           






 /* Условия отображения онлайн или не онлайн*/


                
        echo '<div class="serverBlockNew">
         <div class="NuminRating" id="NuminRating">'. $mesto.'</div>
        <div class="imgLogo"><img src="'. $logo.'" width="75px" alt=""></div>
        <div class="mainInfoServer">
        <a href = "../serverpage.php?server='.$ipserver.'&port='.$portserver.'"> <div class="nameServerNew">'.$nameserver.'</div></a>
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

    </div>';
    
        }
    } else if (!$sort){

    
        //Пагинация


        if (isset($_GET['page']) && $_GET['page'] > 0)  {
            // Если да то переменной $pageno присваиваем его
            $page = $_GET['page'];
            
        
            
        } else { // Иначе
            // Присваиваем $pageno один
            $page = 1;
        }
         
        // Назначаем количество данных на одной странице
        mysqli_real_escape_string($conn, $size_page = 5);
        // Вычисляем с какого объекта начать выводить
        mysqli_real_escape_string($conn, $offset = ($page-1) * $size_page);
        
        // SQL запрос для получения количества элементов
        $count_sql = "SELECT COUNT(*) FROM `minecraft`";
        // Отправляем запрос для получения количества элементов
        $result = mysqli_query($conn, $count_sql);
        // Получаем результат
        $total_rows = mysqli_fetch_array($result)[0];
        // Вычисляем количество страниц
        mysqli_real_escape_string($conn, $total_pages = ceil($total_rows / $size_page));




       

        @  $sql = "SELECT * FROM `minecraft` ORDER BY `minecraft`.`rating` DESC,`minecraft`.`status` DESC LIMIT $offset, $size_page ";
        @$res_data = mysqli_query($conn, $sql);
	    if($res_data = mysqli_query($conn, $sql)){



        foreach($res_data as $row){
            
            @ $id = $row["id_server"];
            @  $nameserver =$row["nameserver"];
            @  $ipserver =$row["ipserver"];
            @  $portserver =$row["portserver"];
            @   $version =$row["version"];
            @   $description =$row["description"];
            @    $banner =$row["banner"];
            @   $rating =$row["rating"];
            @   $votes = $row['votes'];
            @   $playerOnline = $row['playerOnline'];
            @   $playerMax = $row['playerMax'];
            @  $status = $row['status'];
            @ $mesto = $row['mesto'];
            @ $logo = $row['logo'];
            @ $typeserver = $row['typeserver'];
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

           

			// $Query = new MinecraftPing( $ipserver, $portserver );
			// $info = $Query->Query();

	
			// $playerOnline= $info['players']['online'];
			// $playerMax = $info['players']['max'];

            // $sqlupdate = "UPDATE `minecraft` SET `playerOnline` = '$playerOnline',`playerMax` = '$playerMax', `status` = '$status' WHERE `minecraft`.`ipserver` = '$ipserver';";
            // $conn->query($sqlupdate);


		echo '<div class="serverBlockNew">
        <div class="NuminRating" id="NuminRating">'. $mesto.'</div>
        <div class="imgLogo"><img src="'. $logo.'" width="75px" alt=""></div>
        <div class="mainInfoServer">
        <a href = "../serverpage.php?server='.$ipserver.'&port='.$portserver.'"> <div class="nameServerNew">'.$nameserver.'</div></a>
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

    </div>';

    
		}
	}

}


	// Закрываем соединение с БД
	mysqli_close($conn);