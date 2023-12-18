<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "manhattan-bar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("INSERT INTO reservation (name, tables, quantity, id_menu, phone, datetime) VALUES (?, ?, ?, ?, ?, ?)");

    $name = $_POST['name'] ?? '';
    $tables = intval($_POST['tables'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 0);
    $menu = intval($_POST['menu'] ?? 0); // Предполагается, что id_menu - целое число
    $phone = intval($_POST['phone'] ?? '');
    $date = $_POST['date'] ?? '';

    $stmt->bind_param("siiiis", $name, $tables, $quantity, $menu, $phone, $date);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: receipt.php");
        exit();
    } 

    $stmt->close();
    $conn->close();
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

    <link rel="stylesheet" href="style/second-style.css">
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
                <form method="post" action="form.php" id="broner">
                    <div class="name">
                        <input id="name" type="text" name="name" placeholder="Ваше ім'я">
                    </div>

                    <div class="select">
                        <select name="tables" id="number">
                            <option value="1">Столик №1</option>
                            <option value="2">Столик №2</option>
                            <option value="3">Столик №3</option>
                            <option value="4">Столик №4</option>
                            <option value="5">Столик №5</option>
                            <option value="6">Столик №6</option>
                        </select>
                    </div>

                    <div class="select">
                            <select name="quantity" id="numOfpeople">
                                <option value="1">Столик на одного</option>
                                <option value="2">Столик на двох</option>
                                <option value="3">Столик на трьох</option>
                                <option value="4">Столик на чотирьох</option>
                            </select>
                    </div>
                    <div class="select">
                            <select name="menu" id="menu">
                                <option value="1">Грузинське меню</option>
                                <option value="2">Японське меню</option>
                                <option value="3">Італьянське меню</option>
                                <option value="4">Французьке меню</option>
                            </select>
                    </div>

                    <div class="phone">
                         <input id="tel" type="tel" name="phone" placeholder="0980000122">
                    </div>

                    <div class="data-time">
                        <label for="datatime"></label>
                        <input id="datatime" type="datetime-local" name="date">
                    </div>

                    <div class="error-submit">
                        <div class="center-es">
                            <div class="error">
                                <span id="alarm"></span>
                            </div>
                            <div class="submit">
                                <button type="submit" name="submit">ЗАМОВИТИ</button>
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
    <script src="script/form.js"></script>
</body>
</html>