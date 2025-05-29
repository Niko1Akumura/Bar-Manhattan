<?php
require_once __DIR__ . '/../backend/config/DBconnect.php';
require_once __DIR__ . '/../backend/gallery_cache/Gallery.php';
require_once __DIR__ . '/../backend/gallery_cache/Cache.php';
require_once __DIR__ . '/../backend/config/Pagination.php';

use backend\config\DBconnect;
use backend\gallery_cache\Gallery;
use backend\gallery_cache\Cache;
use backend\config\Pagination;

$db = DBconnect::getInstance()->getConnection();

$cache = new Cache();
$gallery = new Gallery($db, $cache);

$images = $gallery->getGallery();
$pagination = new Pagination($images, 6);
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

    <div id="our-gallery">
        <div class="kit-lable">
            <button>
                        <span>
                            TOP "MANHATTAN" GALLERY
                        </span>
            </button>
        </div>
        <div class="header-kit">
                    <span>
                        ГАЛЕРЕЯ
                    </span>
        </div>
        <div id="gallery">
            <?php foreach ($pagData as $image) { ?>
                <div class="gallery-item">
                    <img src="data:image/jpeg;base64,<?= base64_encode($image['gallery_image']) ?>" alt="Gallery Image <?= $image['image_id'] ?>">
                </div>
            <?php } ?>
        </div>
        <div id="gallery-pagination">
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
