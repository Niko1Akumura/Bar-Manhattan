<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manhattan-bar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT r.name, r.tables, r.quantity, r.id_menu, r.phone, r.datetime, m.name_menu AS menu_label
        FROM reservation r
        LEFT JOIN menu m ON r.id_menu = m.id_menu
        ORDER BY r.id DESC
        LIMIT 1";

    $stmt = $conn->query($sql);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $name = $result['name'];
        $tables = $result['tables'];
        $quantity = $result['quantity'];
        $id_menu = $result['id_menu'];
        $phone = $result['phone'];
        $datetime = $result['datetime'];
        $menu_label = $result['menu_label']; 
    }

} catch(PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}

$conn = null;
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

    <link rel="stylesheet" href="style/receipt-style.css">
    <script src="script.js"></script>
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
            <a href="form.php">БРОНЮВАННЯ</a>
           </button>
                
        </header>



        <div id="check">
            <div id="label">
                <div id="label-form">
                    <span>TOP “MANHATTAN” RECEIPT</span>
                </div>
                <div id="inscription">
                    <span>ЧЕК ЗАМОВЛЕННЯ</span>
                </div>
            </div>
            <div id="border">
                <div class="points">
                    <span> Ім'я</span>
                    <span> <?php echo $name; ?></span>
                </div>
                <div class="points">
                    <span> Номер вашого столика</span>
                    <span> <?php echo $tables; ?></span>
                </div>
                <div class="points">
                    <span> Кількість людей</span>
                    <span> <?php echo $quantity; ?></span>
                </div>
                <div class="points">
                    <span> Обране меню</span>
                    <span> <?php echo $menu_label; ?></span>
                </div>
                <div class="points">
                    <span> Номер телефону</span>
                    <span> +380<?php echo $phone; ?></span>
                </div>
                <div class="points">
                    <span> Час бронювання</span>
                    <span> <?php echo $datetime; ?></span>
                </div>
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