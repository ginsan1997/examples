<?php
    include "dbreg.php";
    include 'db.php';


    session_start();
if($_SESSION['logged_user']) { 
   $login = $_SESSION['logged_user']->login;
   if ($_GET['server'] && $_GET['vote']){ 
         $ipserverGet = $_GET['server'];
         // Получаем айпи, айди и кол-во голосов
         $sql = "SELECT * FROM `minecraft` WHERE `ipserver` = '$ipserverGet'";
         $res_data = mysqli_query($conn, $sql);
            if($res_data = mysqli_query($conn, $sql)){
               foreach($res_data as $row){
                  $nameserver = $row['nameserver'];
                 $ipserver = $row['ipserver'];
                 $idServer = $row["id_server"];
                 $votes = $row["votes"];
               }}
               // Получаем айди зареганых по логину
              $sqlIdUser = "SELECT * FROM `users` WHERE `login` = '$login'";
            $resUserId = mysqli_query($conn, $sqlIdUser);

                 if( $resUserId = mysqli_query($conn, $sqlIdUser)){
                  foreach($resUserId as $row){
                 $idUser = $row['id'];

                  }
                }

                 // Проверяем таблицу голосов на идентичные запиши и записываем если что
                   $sqlVoteToday = "SELECT * FROM `votes`";
                      $resCheckVoteToday = mysqli_query($conn, $sqlVoteToday);
                    foreach($resCheckVoteToday as $row){
                        $idServerCheck = $row['id_server'];
                            $idUserCheck = $row['id_user'];
                    }}
                    
                     if ($idUserCheck == $idUser && $idServerCheck !== $idServer || $idUserCheck !== $idUser && $idServerCheck !== $idServer) {

                        $sqlupdateVote = "UPDATE `minecraft` SET `votes` = '$votes'+1 WHERE `minecraft`.`ipserver` = '$ipserver'";
                        mysqli_query($conn, $sqlupdateVote);
                        $nowTime = (int)time();
                        $sqlAddVoteData = "INSERT INTO `votes` (`id_server`, `id_user`, `timeVote`) VALUES ('$idServer', '$idUser', '$nowTime')";
                        mysqli_query($conn,  $sqlAddVoteData);

                        $sqlNewVoteLife = "INSERT INTO `deletevote` (`id_server`, `vote_num`, `timeVote`) VALUES ('$idServer', '1', '$nowTime')";
                        mysqli_query($conn,  $sqlNewVoteLife);

                        
                      echo $message = "Успешно проголосовали за сервер $nameserver ";
                     } else {
                       echo $message = "Вы уже голосовали за сервер $nameserver ";
                     }

                     




                    } else {
                      echo $message = "Зарегистируйся или войди, чтобы голосовать";
}