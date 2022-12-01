
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="serverpage.css">
    <link rel="stylesheet" href="LKserver.css">
    <link rel="stylesheet" href="edit.css">
    
</head>
<body>
<?php include 'pageOwnServerData.php';
 session_start();?>

    <div class="header">
    <a href="/"><div class="catLogo">LOGO</div></a>
         <div class="headerMain">
                
                <div class="cat">FAQ</div>
                <?php if(($_SESSION['logged_user'])) { echo '<a href="/addserver.php"><div class="cat">Добавить сервер</div></a>';} ?>
                <div class="cat">Уведомления</div>
                <div class="cat">Баланс</div>
                <!-- Куки -->
                <?php  if(!isset($_SESSION['logged_user'])) {
                ?>
                    <div class="logo" id="logo"><img src="img/enter.png" alt=""></div>
                    <?php  
                } else { 
                ?>
                <span><p>Привет <?php echo $_SESSION['logged_user']->login; ?></br><br/>Чтобы выйти нажмите <a class="exit" href="/register/exit.php">здесь</a></p></span>
                <?php }?> 

<!-- Куки -->

                
    </div>
    </div>
    <div class="wrapper">
<div class="centerArea">




<div class="areaAuth">





<?php  session_start();
if(isset($_SESSION['logged_user'])) {
                ?>


<div class="register">
            <form action="/register/validation-form/check.php" method="post">
            <div class="textAuth">Создать аккаунт</div>
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required> <br/>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required><br/>
                <input type="password" class="form-control" name="passRepeat" id="passRepeat" placeholder="Повторите пароль" required><br/>
                <input type="text" class="form-control" name="email" id="email" placeholder="Введите почту" required><br/>
                <button class="btn-btn-success" type="submit">Зарегистрироваться</button>
            </form>
            <div class="createAccount"><span><u class="swapOnLog">Залогиниться</u></span> </div>
        </div>

<!-- восстановление пароля -->
        <div class="returnPassArea"> 
    <form action="returnPass.php" method="post">
        <div class="textAuth">Восстановить пароль!</div>
        <p><input type="email" class="form-control" name="email" placeholder="Введите почту" required> </p>
        <p><input class="btn-btn-success" type="submit" value="Отправить" name="returnPass"></p>
    </form>
        </div>
<!-- восстановление пароля -->

<div class="login">
            <form action="/register/validation-form/auth.php" method="post">
                <div class="textAuth">Рады видеть вас снова!</div>
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br/>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required><br/>
                <div id="returnPass"><span class="returnPass">Просрал пароль?</div>
                <button class="btn-btn-success" type="submit">Войти</button>
            </form>

            <div class="lineAuth"></div>
            <div class="createAccount"><span>Нет аккаунта? <u class="swapOnReg">Создать</u></span> </div>
        </div>
        <?php  
                } else { 
                ?>
                <span><p>Привет <br/>Чтобы выйти нажмите <a class="exit" href="/register/exit.php">здесь</a></p></span>
                <?php }?> 






</div>


                 


    <div class="leftMenu">
        <div class="menu">
        <span class="menuTextStart"><a href="/">Список серверов</a></span>
            <span class="menuText"><a href="/podborki.php">Подборки</a></span>
            <span class="menuText"><a href="/">Избранное</a></span>
            <span class="menuTextCut"><?php if(isset($_SESSION['logged_user'])) { echo '<a href="/myservers.php">Мои сервера</a>';}?></span>
            <span class="menuText"><a href="/">Достижения</a></span>
            <span class="menuText"><a href="/">Профиль</a></span>
            <span class="menuText"><a href="/">История операций</a></span>
            <span class="menuTextEnd"><a href="/">Помощь</a></span>
            <span class="menuText"><a href="/">Дискорд</a></span>

        </div>
    </div>
    <div class="mainArea">











    <div class="topAreaLK">
                    <div class="nameServerAreaLK">
                        <div class="LogoServerLK"><img src="<?php  echo $logo ?>" alt=""></div>
                        
                        
                        <div class="nameServerLK"><?php echo $nameserver ?></div>
                       


                        <div class="numberInRatingLK"> # <?php echo $mesto ?> в рейтинге</div>
                    </div>
    </div>

<!-- Изменяем название сервера -->





                    <div class="btnAreaLK">
                                <div class="buttonsWithLogoAreaStatsActive" id="StatsBTNlk">
                                        <div class="btnLK">
                                            <div class="imgLogoLKbtn"></div>
                                            <div class="btnLKName">Статистика</div>
                                        </div>
                                </div>
                                <div class="buttonsWithLogoAreaPageServer" id="pageBTNlk">
                                        <div class="btnLK">
                                            <div class="imgLogoLKbtn"></div>
                                            <div class="btnLKName">Страница сервера</div>
                                        </div>
                                </div>
                                <div class="buttonsWithLogoAreaProd" id="ProdBTNlk">
                                        <div class="btnLK">
                                            <div class="imgLogoLKbtn"></div>
                                            <div class="btnLKName">Продвижение</div>
                                        </div>
                                </div>
                                <div class="buttonsWithLogoAreaShop" id="shopBTNlk">
                                        <div class="btnLK">
                                            <div class="imgLogoLKbtn"></div>
                                            <div class="btnLKName">Магазин</div>
                                        </div>
                                </div>
                                <div class="buttonsWithLogoAreaSettings" id="settingBTNlk">
                                        <div class="btnLK">
                                            <div class="imgLogoLKbtn"></div>
                                            <div class="btnLKName">Настройки</div>
                                        </div>
                                </div>

                    </div>
        <!-- Start Block for changeStats  Statistic-->
                    <div class="CheckDiffStatsOwnServer">

                            <div class="mainOwnStatsBlock">
                                <div class="graphServerMainOwn">
                                    <div class="graphBtnCheck">Онлайн</div>
                                    <div class="graphBtnCheckCalendar">30 октября</div>
                                    <div class="someDateGraph">
                                        <div class="btnForDateGraphDay"> 1 д</div>
                                        <div class="btnForDateGraphThree"> 3 д</div>
                                        <div class="btnForDateGraphSeven"> 7 д</div>
                                        <div class="btnForDateGraphMounth"> 1 м</div>
                                        <div class="btnForDateGraphthreeMounth"> 3 м</div>
                                    </div>
                                </div>
                                
                          




                                <div class="statsAndGraphicLK">
                                    <div class="leftMainInfoLK">
                                        <div class="blockOnlineLKMain">
                                            <div class="onlineScreenNowLK"><?php echo $playerOnline ?></div>
                                            <div class="TimeonlineScreenNowLK">Игроков онлайн сейчас</div>
                                        </div>

                                        <div class="blockPlusOnlineLKMain">
                                            <div class="inCheckServerStatus">+12</div>
                                            <div class="textinCheckServerStatus">В сравнении с предыдущим днем</div>
                                        </div>
                                    </div>  
                                    
                                    <div class="graphStatsLK"> <?php include "graph1.php";?>  </div>   
                                </div>  
                        </div>
                   

       <!-- End Block for changeStats  Statistic-->

    <!-- Start Block for changeStats  PageServer-->
                 <div class="positionInTopLKAndBAnnerOur">
                        <div class="positiontextTopAndRatingNum">
                            <div class="RatingAllLK">Место в списке</div>
                            <div class="allRatingResultsLK">
                                    <div class="poballam">
                                        <div class="numberLKRate"><?php echo $mesto ?></div>
                                        <div class="DescnumberLKRate">По баллам</div>
                                    </div>
                                    <div class="poballam">
                                        <div class="numberLKRate"><?php echo $mestoVote ?></div>
                                        <div class="DescnumberLKRate">По голосам</div>
                                    </div>
                                    <div class="poballam">
                                        <div class="numberLKRate"><?php echo $mestoMiddleOnline ?></div>
                                        <div class="DescnumberLKRate">По среднему онлайну</div>
                                    </div>
                                    <div class="poballam">
                                        <div class="numberLKRate"><?php echo $mestoOnline ?></div>
                                        <div class="DescnumberLKRate">По онлайну</div>
                                    </div>
                            </div>
                        </div>
                        <div class="bannerOurCheeeck">Реклама</div>
                 </div>       
    <!-- End Block for changeStats  PageServer-->
    </div> 


    <!-- bottom Div with Stats MonitoringServer-->

                    <div class="blockStatsMonitoringLK">

                        <div class="statisticMonitoringDateLK"></div>
                        <div class="statisticMonitoringDateLK"></div>
                        
                    </div>
    





    <!-- NextButton PageServerLK -->
    <div class="bannerServerLK"><img src="<?php echo $banner ?>" alt="bannerserver"></div>
                
                <div class="mainInfoServerLK">
                <div class="leftAreaAboutServer">
                    <div class="aboutServerbasic">
                        <div class="serverIconName"><div class="LogoServerLK"><img src="<?php echo $logo ?>" alt=""></div>
                        <!-- Изменения названия сервера -->
                        <div class="nameserver">
                       
                            <?php echo $nameserver ?>
                            
                        </div>

                       



                    </div>
                        <div class="areaACH"> <div class="ACHServer"></div><div class="ACHServer"></div><div class="ACHServer"></div></div>
                    </div>
                    <div class="baseInfoServer">
                    <div class="baseInfoInside">

                                <div class="leftInfo">
                                    <div class="topDataArea">
                                    <div class="dataServerElse"><span>Тип сервера: </span> <?php echo $typeserver ?></div>
                                            <div class="dataServerElse"><span>Версия: </span> <?php echo $version ?> </div>
                                            <div class="dataServerElse"><span>Статус: </span> <?php echo $status ?> </div>
                                            <div class="dataServerElse"><span>Сайт сервера: </span> <?php echo $siteUrl ?> </div>
                                            <br>
                                            <div class="dataServerElse"><span>Донат: </span> <?php echo $donateUrl ?> </div>
                                            <div class="dataServerElse"><span>Группа вк: </span> <?php echo $socialUrl ?> </div>
                                            <div class="dataServerElse"><span>Discord: </span> <?php echo $discordUrl ?> </div>
                                     </div>

                                    </div>

                                     
                                <div class="rightInfo">
                                    <span class="descServerOwner"><?php echo $description ?></span>  
                                    
                                </div>

                       <!-- form desc change-->

<!-- Btns -->
                                
                                <div class="navBTN">
                    <button class="btn " id="btn_tags"><span>Тэги</span></button>
                    <button class="btn" id="btn_screen"><span>Скриншоты</span></button>
                    <button class="btn" id="btn_comment"><span>Комментарии</span></button>
                    
                             </div>


                             


                <div class="InfoblockServer">  
                    <div class="tags" id="tags">
                                <div class="baseInfoLeft">
                                        <?php echo $blocktag ;
                                                ?>
                                </div>
                </div> 
                </div> 
                <div class="screen" id="screen">
                                <div class="baseInfoLeft">
                                        Скрины
                                </div>
                </div> 
                <div class="comment" id="comment">
                                <div class="baseInfoLeft">
                                        Комменты
                                </div>
                </div> 
                                      

                        </div>
                       
                        
                        
                </div>

                </div>
   
    <div class="rightAreaAboutServer">
                            <div class="ipserverETC">
                                    <div class="copyIp"><div class="areaIP"><span class="textIP"><input type="text" value="<?php echo $ipserver ?>:<?php echo $portserver ?>" id="textIP"></span> </div><button class="btn-copy-ip" onclick="myCopy()">Copy text</button></div>
                                    <div class="dataServer"><span>Место в рейтинге: </span> <?php echo $mesto?> </div>
                                    <div class="dataServer"><span>Количество Баллов: </span> <?php echo $rating ?> </div>
                                    <div class="dataServer"><span>Средний онлайн: </span> <?php echo $middlePlayers ?> </div>  
                                    <div class="dataServer"><span>Количество голосов: </span> <?php echo $votes ?> </div>
                                    <div class="onlineServer"><span><?php echo $playerOnline ?>/<?php echo $playerMax ?></span></div>
                            
                            <div class="areaAD">
                                    <div class="btn-server">Настройки</div>
                                    <div class="btn-server">Продвижение сервера</div>
                                    <a href = "../vote.php?server=<?php echo $ipserver ?>&vote=<?php echo $_SESSION['logged_user']->login; ?>"> <div class="btn-server">Голосовать</div></a>
                                    
                            </div>
                            </div> </div>
            
                </div>
      
                

     <!-- NextButton ProdvijenLK -->






                <div class="mainProdLKArea">
                        <div class="blockAboutProdLK">
                            <div class="blockProdLKMain">
                                <div class="textProd">Активные продвижения</div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                    </div>

                            <div class="blockProdLKMain">
                                <div class="textProd">История продвижения</div>
                                <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                        <div class="baseInfoText"> <div class="titleInfo">10 баллов</div> <div class="dateInfoProd">15 мая 2022 > 15 августа 2022 <div class="ChangeSetting"> <img src="img/settings.png" width="24px" height="24px" alt=""></div> </div>    </div>
                                    </div>
                        </div>

                        <div class="blockAboutProdLK">
                            <div class="blockProdLK">
                               
                            <div class="imgProd"></div>
                                <div class="textProd">История продвижения</div>
                                <div class="baseInfoTextBottom"> <div class="titleInfo">Описание продвижения л бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блбал бла бла бла бла бла бла бла бла бла бла бла бла</div></div>
                            
                            </div>
                            <div class="blockProdLK">
                            <div class="imgProd"></div>
                                <div class="textProd">Баннер на странице подборок</div>
                                <div class="baseInfoTextBottom"> <div class="titleInfo">Описание продвижения л бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блбал бла бла бла бла бла бла бла бла бла бла бла бла</div></div>
                            
                            </div>
                        </div>

                        <div class="blockAboutProdLK">
                            <div class="blockProdLK">
                            <div class="imgProd"></div>
                                <div class="textProd">Анимированный логотип</div>
                                <div class="baseInfoTextBottom"> <div class="titleInfo">Описание продвижения л бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блбал бла бла бла бла бла бла бла бла бла бла бла бла</div></div>
                            
                            </div>
                            <div class="blockProdLK">
                            <div class="imgProd"></div>
                                <div class="textProd">Баннер на странице сервера</div>
                                <div class="baseInfoTextBottom"> <div class="titleInfo">Описание продвижения л бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блл бла бла блбал бла бла бла бла бла бла бла бла бла бла бла бла</div></div>
                            
                            </div>
                        </div>

                    </div>

 <!-- NextButton ProdvijenLK -->




  <!-- NextButton Settings -->
                <div class="settingLKArea">
                        <div class="mainInfoSettingsServer">
                            <div class="nameMainSettingSErver">Основная информация</div>

                            <form action="editData.php" method="POST" name="addServer" enctype="multipart/form-data">
                                <div class="lineSettingServer"><div class="nameSettingSErver">IP *</div> <input name ="IPserverChange" type="text" placeholder="<?php echo $ipserver?>"> </div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">PORT *</div> <input name ="PORTserverChange" type="text" placeholder="<?php echo $portserver?>"> </div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">Название сервера *</div><input name ="changeName" type="text" value="<?php echo $nameserver?>"></div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">Тип сервера *</div>  <select name="typeserver" required> <option>java</option> <option>PE</option> </select></div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">Версия *</div><select name="versionServer" required> <option>1.12.2</option> <option>1.19.2</option> </select></div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">Логотип сервера </div>  <label class="label"><i class="material-icons">Добавить лого</i><input type="file" accept="image/png, image/jpg, image/gif, image/jpeg" name="logo"></label></div>
                                <div class="lineSettingServer"><div class="nameSettingSErver">Описание </div><p><textarea class="descriptionServerArea" placeholder="Опишите свой сервер..." maxlength="1000" name="descriptionServer"></textarea></p></div>
                                
                                <div class="aboutBannerServer">
                                    <div class="leftAboutBannertext">
                                        <div class="TitleAboutBanner">Баннер в начале страницы</div>
                                            <div class="DescAboutBanner">
                                                Хотите чтобы все узнали о скидках 
                                                или каком либо событии на вашем сервере?Поместите красочный баннер в верхушку страницы 
                                                вашего сервера, он точно привлечёт внимание!
                                            </div>
                                            <div class="buttonBanner">Приобрести услугу</div>
                                    </div>

                                    <div class="RightAboutBannertext">
                                        <div class="TitleAboutBanner">Баннер в начале страницы</div>
                                            <div class="DescAboutBanner">
                                            Поместите красочный баннер в верхушку страницы 
                                            вашего сервера, он точно привлечёт внимание!
                                            Размеры баннера: 1550х210 px 
                                            </div>
                                            <div class="lineBannerAdd">  <label class="labelBanner"><i class="material-icons-Banner">Добавить Баннер</i><input type="file" accept="image/png, image/jpg, image/gif, image/jpeg" name="banner"></label></div>


                                    </div>
                                </div>

                                <div class="screenshots">
                                    <div class="titleScreenshots">Скриншоты</div>
                                    <div class="lineBannerAdd">  <label class="labelScreenshots"><i class="material-icons-screenshots">Загрузить скриншоты (до 8 штук)</i><input type="file" accept="image/png, image/jpg, image/gif, image/jpeg" name="screenshots"></label></div>
                                </div>

                                <div class="tagsBlockMain">
                                    <div class="tagstextLine">Теги <img src="img/arrow_down.png" alt=""></div>
                                    <div class="blockwithtags">
                                        <div class="nameTagsFeatures">Особенности</div>
                                            <div class="areaTagsBlock">
                                                <div class="tagBlock"><p><input type="checkbox" name="tags[]" value="Выживание" />Выживание</p></div>
                                                <div class="tagBlock"><p><input type="checkbox" name="tags[]" value="PVP" />PVP</p></div>
                                                <div class="tagBlock"><p> <input type="checkbox" name="tags[]" value="Приват" />Приват</p></div>
                                            </div>
                                   
                                        <div class="nameTagsFeatures">Режимы</div>
                                        <div class="areaTagsBlock">
                                            <p><input type="checkbox" name="tags[]" value="Выживание" />Выживание</p>
                                            <p><input type="checkbox" name="tags[]" value="PVP" />PVP</p>
                                            <p> <input type="checkbox" name="tags[]" value="Приват" />Приват</p>
                                        </div>
                                    

                                    
                                        <div class="nameTagsFeatures">Плагины</div>
                                        <div class="areaTagsBlock">
                                            <p><input type="checkbox" name="tags[]" value="Выживание" />Выживание</p>
                                            <p><input type="checkbox" name="tags[]" value="PVP" />PVP</p>
                                            <p> <input type="checkbox" name="tags[]" value="Приват" />Приват</p>
                                        </div>
                                    </div>
                                    </div>
                                
                                

                                <div class="urlBlockArea">
                                        <div class="urlstextLine">Ссылки <img src="img/arrow_down.png" alt=""></div>
                                        
                                        
                                        <div class="blockWithURLS">
                                            <div class="blockUrl">
                                                <div class="nameUrl">Сайт</div>
                                                <input type="text" class="siteURLArea" name ="siteURL" placeholder="Введите ссылку">
                                            </div>

                                            <div class="blockUrl">
                                                <div class="nameUrl">Донат</div>
                                                <input type="text" class="siteURLArea" name ="donateURL" placeholder="Введите ссылку">
                                            </div>

                                            <div class="blockUrl">
                                                <div class="nameUrl">Discord</div>
                                                <input type="text" class="siteURLArea" name ="discrodURL" placeholder="Введите ссылку">
                                            </div>

                                            <div class="blockUrl">
                                                <div class="nameUrl">Соц.Сеть</div>
                                                <input type="text" class="siteURLArea" name ="socialURL" placeholder="Введите ссылку">
                                            </div>
                                        </div>
                                        <input name="server" type="hidden" id="server" value="<?php echo $ipserver?>">
                                </div>


                                <button class="saveServerSettings" type="submit">Сохранить</button>
                            </form>
                            <?php echo $error ?>
                        </div>
                </div>
  <!-- NextButton Settings -->
                   
                        <form method="POST" action="editData.php">
                        <input class = "changeName" type="text" name="changeName"> 
                        <input name="server" type="hidden" id="server" value="<?php echo $ipserver?>">
                        </form>







                            
                </div>   


    </div>

    <!-- NextButton PageServerLK -->






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="app.js"></script>
    <script src="ownJSScript.js"></script>
    <script src="edit.js"></script>

</body>
</html>