<?php

    require_once __DIR__ . '/backend/proxy/AdvertisingProxy.php';
    require_once __DIR__ . '/backend/config/DBconnect.php';

    use backend\config\DBconnect;
    use backend\proxy\AdvertisingProxy;
    use backend\config\Pagination;

    $db = DBconnect::getInstance()->getConnection();
    $proxy = new AdvertisingProxy($db);

    $showAdvertising = isset($_GET['advertising']) ? $_GET['advertising'] : '0';

    if($showAdvertising == 0) {
        $advertisingData = $proxy->getLazyAdvertising();
    } elseif ($showAdvertising == 1) {
        $advertisingData = $proxy ->getAdvertising();
    }

?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Ukranian Bar</title>
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <!-- Robot -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/logo and fav.png">

    <link rel="stylesheet" href="style/style.css">
    <script src="script/jquery-3.7.1.js"></script>
    <script src="script/jquery.simpleGallery.js"></script>
    <script>
        $(document).ready(function() {
            $('.bigest-banner').simpleGallery();
        });
    </script>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo and fav.png" alt="">
                </a>
            </div>

            <nav>
                <ul>


                    <li>
                        <a href="view/comments.php">Відгуки</a>
                    </li>

                    <li>
                        <a href="./view/poster.php">Афіша</a>
                    </li>

                    <li>
                        <a href="">Співпраця</a>
                    </li>

                    <li>
                        <a href="view/gallery.php">Галерея</a>
                    </li>

                    <li>
                        <a href="">Новини</a>
                    </li>

                    <li>
                        <a href="view/foradmin.html">Для адміністрації</a>
                    </li>

                </ul>
            </nav>
                
        </header>

        <div class="main-banner">
            <div class="bigest-banner">
                <img src="img/Rectangle 30.png" alt="Bigest-banner">
                <img src="img/banner%202.jpg">
                <img src="img/banner%203.jpg">

                <div class="banner-text">
                    TRUE.FONTANKA.<br>UNDEGROUND.
                </div>

                <div class="frame-bibanner">
                    SINCE 1996
                </div>
            </div>

            <div class="js-banner">
                <button id="nearestButton" class="tab">НАЙБЛИЖЧІ</button>
                <button id="soonButton" class="tab">СКОРО</button>

                <div class="wrapper">
                    <img src="img/Rectangle 32.png" alt="">
                    <img src="img/Rectangle 33.png" alt="">
                    <img src="img/Rectangle 34.png" alt="">
                    <img src="img/Rectangle 35.png" alt="">
                </div>

            </div>
        </div>

        <div class="events-tourists">
            <div class="kit">
                <div class="kit-lable">
                    <button>
                        <span>
                            TOP "MANHATTAN" EVENTS
                        </span>
                    </button>
                </div>
                <div class="header-kit">
                    <span>
                        БАНКЕТИ
                    </span>
                </div>
                <div class="desc-kit">
                    <span>
                        Quam massa pretium et venenatis. Fringilla sagittis, arcu massa, in sem viverra consequat. Tempus sed est interdum eget nisi, nec fames. Eget amet hac varius aliquam. Mattis egestas suspendisse convallis eu arcu et aliquet. <br>
                        
Porttitor risus sociis vitae nunc id lacus eget felis. Viverra et purus nibh ut. Sed ac leo sit posuere vulputate sed morbi. Donec gravida at turpis sed pulvinar. A nibh non consectetur morbi in arcu, in pellentesque mauris. <br>
Eu sodales netus faucibus interdum interdum platea massa egestas. Facilisis donec gravida pretium diam semper at id eleifend.
                    </span>
                </div>
                <div class="kit-bth">
                    <button>
                        <a href="">ДЕТАЛЬНІШЕ</a>
                    </button>
                </div>
            </div>

            <div class="midl-img">
                <img src="img/Rectangle 39.png" alt="">
            </div>

            <div class="kit">
                <div class="kit-lable">
                    <button>
                        <span>
                            TOP "MANHATTAN" TOURISTS
                        </span>
                    </button>
                </div>
                <div class="header-kit">
                    <span>
                        ТУРИСТИ
                    </span>
                </div>
                <div class="desc-kit">
                    <span>
                        Quam massa pretium et venenatis. Fringilla sagittis, arcu massa, in sem viverra consequat. Tempus sed est interdum eget nisi, nec fames. Eget amet hac varius aliquam. Mattis egestas suspendisse convallis eu arcu et aliquet. <br>
                        
                        Porttitor risus sociis vitae nunc id lacus eget felis. Viverra et purus nibh ut. Sed ac leo sit posuere vulputate sed morbi. Donec gravida at turpis sed pulvinar. A nibh non consectetur morbi in arcu, in pellentesque mauris. <br>
                        Eu sodales netus faucibus interdum interdum platea massa egestas. Facilisis donec gravida pretium diam semper at id eleifend.
                    </span>
                </div>
                <div class="kit-bth">
                    <button>
                        <a href="">ДЕТАЛЬНІШЕ</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="rider">
            <div class="rider-header">

                <div class="rider-frame">
                    <button>
                        <span>TOP "MANHATTAN" PARTY</span>
                    </button>
                </div>   

                <div class="rider-label">
                    <span>
                        ТЕХРАЙДЕР
                    </span>
                </div>

            </div>

            <div class="rider-content">

                <div class="equipment">

                    <div class="tool">
                        <span>LOUDSPEAKERS</span>

                        <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>

                    </div>

                    <div class="tool">
                        <span>AMPLIFIER</span>

                         <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>
                        
                    </div>

                    <div class="tool">
                        <span>FOH</span>

                        <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>
                        
                    </div>

                    <div class="tool">
                        <span>BACKLINIE</span>
                        
                        <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>
                        
                    </div>

                    <div class="tool">
                        <span>MICROPHONE SET</span>
                        
                        <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>
                        
                    </div>

                    <div class="tool">
                        <span>DJ EQUIPMENT</span>
                        
                        <div class="tool-img">
                            <img src="img/Vector.png" alt="">
                        </div>
                        
                    </div>

                </div>

                <div class="sound-eng">
                    <div class="sound-label">
                        <span>
                            ЗВУКОРЕЖИСЕРИ КЛУБУ МАНХЕТТЕН
                        </span>
                    </div>

                    <div class="eng-img">
                        <img src="img/Rectangle 42.png" alt="">
                        <img src="img/Rectangle 43.png" alt="">
                    </div>

                    <div class="eng-name">
                        <span>Микита <br> Сиволап</span>
                        <span>Кирилл <br> Бзенко</span>
                    </div>

                    <div class="eng-mess">
                        <div class="mess-img">

                            <a href="">
                                <div class="border-mess">
                                    <img src="img/icons8-instagram-20.png" alt="">
                                </div>                              
                            </a>
                               
                            <a href="">
                                <div class="border-mess">
                                    <img src="img/icons8-telegram-20.png" alt="">  
                                </div>
                            </a>
                              
                        </div>

                        <div class="mess-img">

                            <a href="">
                                <div class="border-mess">
                                    <img src="img/icons8-instagram-20.png" alt="">
                                </div>                              
                            </a>
                               
                            <a href="">
                                <div class="border-mess">
                                    <img src="img/icons8-telegram-20.png" alt="">  
                                </div>
                            </a>
                              
                        </div>
                        
                    </div>

                </div>

            </div>
        </div>

        <div class="place">
            <div class="contact-header">

                <div class="contact-frame">
                    <button>
                        <span>TOP "MANHATTAN" PLACE</span>
                    </button>
                    
                </div>

                <div class="contact-label">
                    <span>КОНТАКТИ</span>
                </div>
            </div>

            <div class="map-and-contact">
                <div class="contact">                   
                    <div class="contact-ifo">
                        <div class="address-info">
                            <span id="up">АДРЕСА</span>
                            <span id="down">площа Визволення, 2, Кривий Ріг, Дніпропетровська область, 50000</span>
                        </div>

                        <div class="phon-ifo">
                            <span id="up">ТЕЛЕФОН</span>
                            <span id="down">0973094192</span>
                        </div>

                        <div class="time">
                            <span id="up">ЧАС РОБОТИ</span>
                            <span id="down">ПН-СБ 08:30 - 21:00</span>
                        </div>
                    </div>

                    <hr>

                    <div class="directors">
                            <div class="director">
                                <span id="up">ДИРЕКТОР</span>
                                <span id="down">Шайкан Андрій Валерійович</span>
                            </div>

                            <div class="art-director">
                                <span id="up">АРТ-ДИРЕКТОР</span>
                                <span id="down">Гушко Сергій Володимирович</span>
                            </div>
                    </div>
                </div>

                <div class="map">
                    <img src="img/map.png" alt="">
                </div>
            </div>
        </div>

        <div class="advertising-area">
            <div class="contact-header">

                <div class="contact-frame">
                    <button>
                        <span>TOP "MANHATTAN"
                            ADVERTISING</span>
                    </button>

                </div>

                <div class="contact-label">
                    <span>РЕКЛАМА</span>
                </div>
            </div>
            <div class="advertising-form">
                <form name="advertisingForm" class="advertisingForm">
                    <select name="advertising">
                        <option value="0" <?= $showAdvertising == '0' ? 'selected' : '' ?>>Приховати</option>
                        <option value="1" <?= $showAdvertising == '1' ? 'selected' : '' ?>>Показати</option>
                    </select>
                    <button type="submit">ОК</button>
                </form>
            </div>
            <div class="advertising-banners">
                <?php
                    foreach ($advertisingData as $advertising) {
                        echo '<div>';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($advertising['advertising_img']) . '" alt="Advertisement Image">';
                        echo '<p>' . htmlspecialchars($advertising['advertising_text']) . '</p>';
                        echo '</div>';
                }
                ?>
            </div>
        </div>

        <hr id="footer">

        <div class="footer">
            <span>DUET© 2023. Всі права захищені</span>
            <span>Розроблено: @akumuraniko</span>
        </div>

    </div>
</body>
</html>