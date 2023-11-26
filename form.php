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

    <link rel="stylesheet" href="second-style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="index.html">
                    <img src="img/logo and fav.png" alt="">
                </a>
            </div>

            <nav>
                <ul>
                    <li>
                        <a href="index.html">Головна</a>
                    </li>

                    <li>
                        <a href="">Меню</a>
                    </li>

                    <li>
                        <a href="">Афіша</a>
                    </li>

                    <li>
                        <a href="">Співпраця</a>
                    </li>

                    <li>
                        <a href="">Галерея</a>
                    </li>

                    <li>
                        <a href="">Новини</a>
                    </li>

                </ul>
            </nav>

           <button>
            <a href="broner.php">БРОНЮВАННЯ</a>
           </button>
                
        </header>

        <div class="myform">

            <div class="label-form">
                <span>
                    TOP “MANHATTAN” RESERVATION
                </span>
            </div>

            <div class="inscription">
                <span>
                    БРОНЮВАННЯ
                </span>
            </div>

            <div class="form">
                <form method="post" id="broner">
                    <div class="name">
                        <input id="name" type="text" name="name" placeholder="Ваше ім'я">
                    </div>

                    <div class="number">
                        <select name="number" id="number">
                            <option value="1">Столик №1</option>
                            <option value="2">Столик №2</option>
                            <option value="3">Столик №3</option>
                            <option value="4">Столик №4</option>
                            <option value="5">Столик №5</option>
                            <option value="6">Столик №6</option>
                        </select>
                    </div>

                    <div class="num-of-people">
                            <div class="select-container">
                                <select name="numOfpeople" id="numOfpeople">
                                    <option value="1">Столик на одного</option>
                                    <option value="2">Столик на двух</option>
                                    <option value="3">Солик на трьох</option>
                                    <option value="4">Столик на чотирьох</option>
                                    <option value="5">Столик на п'ятьох</option>
                                    <option value="6">Столик на шісьтьох</option>
                                </select>
                            </div>
                    </div>

                    <div class="phone">
                        <input id="tel" type="tel" name="tel" placeholder="0980000122">
                    </div>

                    <div class="data-time">
                        <label for="data-time"></label>
                        <input id="datatime" type="datetime-local" name="data-time">
                    </div>

                    <div class="error-submit">
                        <div class="center-es">
                            <div class="error">
                                <span id="alarm">

                                </span>
                            </div>

                            <div class="submit">
                                <button type="submit" name="button">ЗАМОВИТИ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <hr id="footer">

        <div class="footer">
            <span>DUET© 2023. Всі права захищені</span>
            <span>Розроблено: @akumuraniko</span> 
        </div>

    </div>
    <script src="form.js"></script>
</body>
</html>