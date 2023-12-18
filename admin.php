<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "manhattan-bar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $results_per_page = 3;

    $reservation_sql = "SELECT id, name, tables, quantity, id_menu, phone, datetime FROM reservation";

    $reservation_result = $conn->query($reservation_sql);

    $total_reservation_results = $reservation_result->num_rows;

    $total_reservation_pages = ceil($total_reservation_results / $results_per_page);

    if (!isset($_GET['res_page'])) {
        $reservation_page = 1;
    } else {
        $reservation_page = $_GET['res_page'];
    }

    $reservation_start_index = ($reservation_page - 1) * $results_per_page;
    $reservation_pagination_sql = "SELECT id, name, tables, quantity, id_menu, phone, datetime FROM reservation LIMIT $reservation_start_index, $results_per_page";
    $reservation_pagination_result = $conn->query($reservation_pagination_sql);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteById']) && !empty($_POST['deleteById'])) {
            $delete_id = $_POST['deleteById'];

            $delete_sql = "DELETE FROM reservation WHERE id = $delete_id";

            if ($conn->query($delete_sql) === TRUE) {
                
            }
        } 
    }
?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Ukranian Bar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logo and fav.png">
    <link rel="stylesheet" href="style/admin-style.css">
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

        <div id="tools-admin">
            <div id="label">
                <div id="label-form">
                    <span>TOP “MANHATTAN” ADMIN</span>
                </div>
                <div id="inscription">
                    <span>ІНСТРУМЕНТИ АДМІНІСТРАЦІї</span>
                </div>
            </div>

            <div id="tables">

                <div id="tools">
                <form method="post">
                    <label for="deleteById">Удалить по ID:</label>
                    <input type="text" id="deleteById" name="deleteById">
                    <button type="submit">Удалить</button>
                </form>

                </div>

                <div id="reservation-table">  
                    <table>
                        <tr>
                            <th class="label">ID</th>
                            <th class="label">Name</th>
                            <th class="label">Tables</th>
                            <th class="label">Quantity</th>
                            <th class="label">ID Menu</th>
                            <th class="label">Phone</th>
                            <th class="label">Datetime</th>
                        </tr>
                        <?php
                            if ($reservation_pagination_result->num_rows > 0) {
                                while ($row = $reservation_pagination_result->fetch_assoc()) {
                                    echo "<tr>
                                            <td class='date-bd'>" . $row["id"] . "</td>
                                            <td class='date-bd'>" . $row["name"] . "</td>
                                            <td class='date-bd'>" . $row["tables"] . "</td>
                                            <td class='date-bd'>" . $row["quantity"] . "</td>
                                            <td class='date-bd'>" . $row["id_menu"] . "</td>
                                            <td class='date-bd'>" . $row["phone"] . "</td>
                                            <td class='date-bd'>" . $row["datetime"] . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>0 results</td></tr>";
                            }
                        ?>
                    </table>

                    <div class="pagination">
                        <?php
                            for ($i = 1; $i <= $total_reservation_pages; $i++) {
                                echo "<a class='page-link' href='?res_page=" . $i . "'>" . $i . "</a> ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <hr id="footer">

        <div class="footer">
            <span>DUET© 2023. Всі права захищені</span>
            <span>Розроблено: @akumuraniko</span>
        </div>

    </div>
    <script src="script/admin.js"></script>
</body>
</html>
