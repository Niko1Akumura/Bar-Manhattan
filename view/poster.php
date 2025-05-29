<?php
    require_once __DIR__ . '/../backend/config/DBconnect.php';
    require_once __DIR__ . '/../backend/models/GroupFetcher.php';
    require_once __DIR__ . '/../backend/config/Pagination.php';

    use backend\config\Pagination;
    use backend\config\DBconnect;
    use backend\models\GroupFetcher;

    $db = DBconnect::getInstance()->getConnection();

    $params = [
        'group_genre' => isset($_GET['group_genre']) ? $_GET['group_genre'] : '',
        'start_rating' => isset($_GET['start_rating']) ? $_GET['start_rating'] : '',
        'finish_rating' => isset($_GET['finish_rating']) ? $_GET['finish_rating'] : ''
    ];

    $groupFetcher = new GroupFetcher($db);
    $groups = $groupFetcher->getGroups($params);

    $pagination = new Pagination($groups, 8);
    $current = isset($_GET['current']) ? (int)$_GET['current'] : 1;
    $pagData = $pagination->getData($current);
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Афіша</title>
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <!-- Robot -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/logo and fav.png">

    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../img/logo and fav.png" alt="">
            </a>
        </div>

        <nav>
            <ul>

                <li>
                    <a href="../index.php">Головна</a>
                </li>

                <li>
                    <a href="comments.php">Відгуки</a>
                </li>

                <li>
                    <a href="">Співпраця</a>
                </li>

                <li>
                    <a href="gallery.php">Галерея</a>
                </li>

                <li>
                    <a href="">Новини</a>
                </li>

                <li>
                    <a href="./foradmin.html">Для адміністрації</a>
                </li>

            </ul>
        </nav>

    </header>

    <div id="groups_filter_search">
        <div class="form_container">
            <form method="get" class="form_center" id="filterForm">
                <select name="group_genre" id="group_genre">
                    <option value="">Всі</option>
                    <option value="Поп-рок">Поп-рок</option>
                    <option value="Рок">Рок</option>
                    <option value="Хеві-метал">Хеві-метал</option>
                    <option value="Метал">Метал</option>
                    <option value="Альтернативний рок">Альтернативний рок</option>
                    <option value="Данс-поп">Данс-поп</option>
                    <option value="Хаус-музика">Хаус-музика</option>
                    <option value="Альт-поп">Альт-поп</option>
                </select>
                <input type="text" name="start_rating" placeholder="Від">
                <input type="text" name="finish_rating" placeholder="До">
                <button type="submit">Пошук</button>
            </form>
        </div>
        <div id="groups">
            <?php
            foreach ($pagData as $group) {
                echo '<div class="group">';
                echo '<img src="data:image/jpeg;base64,' . $group['group_img'] . '">';
                echo '<h2 class="group_name">' . $group['group_name'] . '</h2>';
                echo '<span class="genre_name">' . $group['genre_name'] . '</span>';
                echo '<span class="group_rating">' . $group['group_rating'] . "/5" . '</span>';
                echo '<span class="group_description">' . $group['group_description'] . '</span>';
                echo '</div>';
            }
            ?>
        </div>
        <div id="groups_pagination">
            <?php echo $pagination->getLink();?>
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