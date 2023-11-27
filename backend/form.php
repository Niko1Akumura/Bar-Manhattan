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
                        <form method="post" action="form.php" id="broner">
                <div class="name">
                    <input id="name" type="text" name="name" placeholder="Ваше ім'я">
                </div>

                <div class="number">
                    <select name="tables" id="number"> <!-- изменение названия поля на "tables" -->
                        <option value="1">Столик №1</option>
                        <!-- ... остальные опции ... -->
                    </select>
                </div>

                <div class="num-of-people">
                    <div class="select-container">
                        <select name="quantity" id="numOfpeople"> <!-- изменение названия поля на "quantity" -->
                            <!-- ... опции количества людей ... -->
                        </select>
                    </div>
                </div>

                <div class="phone">
                    <input id="tel" type="tel" name="phone" placeholder="0980000122"> <!-- изменение названия поля на "phone" -->
                </div>

                <div class="data-time">
                    <label for="data-time"></label>
                    <input id="datatime" type="datetime-local" name="date"> <!-- изменение названия поля на "date" -->
                </div>

                <div class="error-submit">
                    <div class="center-es">
                        <div class="error">
                            <span id="alarm"></span>
                        </div>
                        <div class="submit">
                            <button type="submit" name="button">ЗАМОВИТИ</button>
                        </div>
                    </div>
                </div>
            </form>

            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "manhattan-bar";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $tables = intval($_POST['tables']);
    $quantity = intval($_POST['quantity']);
    $phone = intval($_POST['phone']);
    $dateTime = $_POST['date'];

    $sql = "INSERT INTO reservation(`name`, `tables`, `quantity`, `phone`, `date`) VALUES ('$name', $tables, $quantity, $phone, '$dateTime')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Ошибка при добавлении записи: " . mysqli_error($conn);
    } else {
        echo "Новая запись успешно добавлена";
    }

    mysqli_close($conn);
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
    <script src="form.js"></script>
</body>
</html>