<?php 
    
    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPing.php';
    require __DIR__ . '../PHP-Minecraft-Query/src/MinecraftPingException.php';
    
    use xPaw\MinecraftPing;
    use xPaw\MinecraftPingException;
    include 'db.php';
    include 'dbreg.php';
    session_start();
    $loginCheck = $_SESSION['logged_user']->login;
    $sqlCheckID = "SELECT * FROM `users` WHERE `login` = '$loginCheck'";
    $resCheckID = mysqli_query($conn, $sqlCheckID);
    foreach($resCheckID as $row){
         $idUser = $row["id"];
    }
    
    $wordForAccept = 'monitoring'.$idUser;

 
    $ip = $_GET['server'];
    $port = $_GET['port'];

    if ($_GET['server'] && $_GET['port'] &&  isset($loginCheck)){
    try
            {
                $Query = new MinecraftPing($ip, $port);
                $info = $Query->Query( );
         
                $playerOnline= $info['players']['online'];
                $playerMax = $info['players']['max'];    
                $nameServer = $info["description"]['text'];   
                $textForCheck = $nameServer;
                '<br>';
                
               
                
    
                    if ( $textForCheck == 'monitoring'.$idUser){
                        $sqlAddNewOwner = "UPDATE `minecraft` SET `owner` = '$loginCheck',`confirmIDplayer` = '$idUser' WHERE `ipserver` = '$ip' AND `portserver` = '$port'";
                        $conn->query($sqlAddNewOwner); 
                        echo $messageConfirmServer = 'Вы подтвердили сервер';
                        echo '<br>';
                    } else {
                        echo $messageConfirmServer = 'No. error';
                        echo '<br>';
                    }


            }
            catch( MinecraftPingException $e )
            {
                $Exception = $e;
                $conn->query($sqlupdate);    
            }
            if( $Query !== null )
            {

                $Query->Close( );
            }
        } else {
            echo "Ошибка. Выбери сервер или войди в систему";
            echo '<br>';
        }
        mysqli_close($conn);
?>
