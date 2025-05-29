<?php
require_once __DIR__ . '/../backend/config/DBconnect.php';
require_once __DIR__ . '/../backend/chain/Validation/NameValidationHandler.php';
require_once __DIR__ . '/../backend/chain/validation/SurnameValidationHandler.php';
require_once __DIR__ . '/../backend/chain/validation/RatingValidationHandler.php';
require_once __DIR__ . '/../backend/chain/validation/CommentValidationHandler.php';

use backend\config\DBconnect;
use backend\chain\validation\NameValidationHandler;
use backend\chain\validation\SurnameValidationHandler;
use backend\chain\validation\RatingValidationHandler;
use backend\chain\validation\CommentValidationHandler;

$db = DBconnect::getInstance()->getConnection();
$error_mess = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'userName' => $_POST['userName'],
        'userSurname' => $_POST['userSurname'],
        'commentRating' => $_POST['commentRating'],
        'comment_text' => $_POST['comment_text']
    ];
    try {
        $nameValidator = new NameValidationHandler();
        $surnameValidator = new SurnameValidationHandler();
        $ratingValidator = new RatingValidationHandler();
        $commentValidator = new CommentValidationHandler();

        $nameValidator
            ->setNext($surnameValidator)
            ->setNext($ratingValidator)
            ->setNext($commentValidator);

        $nameValidator->handle($data);

        $sql = "INSERT INTO `comments`(`comment_name`, `comment_surname`, `comment_rating`, `comment_text`)
                VALUES (:name, :surname, :rating, :comment)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':name' => $data['userName'],
            ':surname' => $data['userSurname'],
            ':rating' => $data['commentRating'],
            ':comment' => $data['comment_text']
        ]);

        $error_mess = "Комментарий успешно добавлен!";
    } catch (Exception $e) {
        $error_mess = "Ошибка: " . $e->getMessage();
    }
}
?>
<?php
require_once __DIR__ . '/../backend/config/DBconnect.php';
require_once __DIR__ . '/../backend/strategy/Context.php';
require_once __DIR__ . '/../backend/strategy/GoodReview.php';
require_once __DIR__ . '/../backend/strategy/NegativeReview.php';
require_once __DIR__ . '/../backend/config/Pagination.php';

use backend\strategy\Context;
use backend\strategy\GoodReview;
use backend\strategy\NegativeReview;
use backend\config\Pagination;

$db = DBconnect::getInstance()->getConnection();

$strategy = new GoodReview();

if (isset($_GET['review']) && $_GET['review'] === '0') {
    $strategy = new NegativeReview();
}

$context = new Context($strategy);
$reviews = $context->getReviews($db);
$pagination = new Pagination($reviews, 8);
    $current = isset($_GET['current']) ? (int)$_GET['current'] : 1;
    $pagData = $pagination->getData($current);
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Відгуки</title>
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
    <script src="../script/postComment.js"></script>
    <script src="../script/commentsPagination.js"></script>
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
                    <a href="./poster.php">Афіша</a>
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

    <div id="comments_and_description">
        <div id="description">
            <div id="header_description">
                <h1>TOP "MANHATTAN" COMMENTS</h1>
                <h2>КОМЕНТАРІ</h2>
            </div>
            <div id="main_description">
                <span>Тут ви маєте можливість відзначити ваші
                    враження від відвідування нашого нічного клубу.
                    Ми завжди раді чути ваші думки та відгуки, оскільки
                    ваша задоволеність є для нас пріоритетною. Наша команда
                    працює наполегливо, щоб забезпечити ваш комфорт та задоволення
                    під час перебування в нашому закладі. Будь ласка, не соромтеся
                    ділитися своїми враженнями та зауваженнями - це допоможе нам
                    поліпшувати наші послуги та створювати кращі умови для вас.</span>
            </div>
        </div>
        <div id="pagination_and_form">
            <div id="form_container">
                <form method="post" class="form_center" id="commentsForm">
                    <input type="text" name="userName" id="name" placeholder="Микита">
                    <input type="text" name="userSurname" id="surname" placeholder="Кожумяка">
                    <label for="rating">Оцінка нашого закладу</label>
                    <select name="commentRating" id="rating">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <textarea id="comment" name="comment_text" form="commentsForm" placeholder="Крутий бар..."></textarea>
                    <div id="errorArea">
                        <?php echo $error_mess?>
                    </div>
                    <button type="submit">НАДІСЛАТИ</button>
                </form>
            </div>
            <div class="container_review">
                <form method="get" id="form_review">
                    <select name="review" id="review">
                        <option value="1">Сподобалось</option>
                        <option value="0">Не сподобалось</option>
                    </select>
                    <button type="submit">OK</button>
                </form>
            </div>
            <div id="comments">
                <?php
                foreach ($pagData as $review) {
                    echo "<div class='post'>";
                    echo "<p class='big_p'>{$review['comment_name']}  </p>";
                    echo "<p class='default_p'>{$review['comment_surname']}</p>";
                    echo "<p class='big_p'>{$review['comment_text']}</p>";
                    echo "<p class='default_p'>(Оцінка: {$review['comment_rating']})</p>";
                    echo "</div>";
                }
                ?>
            </div>
            <div id="pagination_comments">
                <?php echo $pagination->getLink();?>
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