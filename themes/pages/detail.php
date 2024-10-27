<?php
require_once "../blocks/head.php";
require_once "../../connect.php";
require_once "../blocks/header.php";
$id_article = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_article !== null) {
    $sql = "SELECT * FROM `articles` WHERE `id` = " . $id_article;
    $res = mysqli_query($con, $sql);

    if ($res) {
        $row = $res->fetch_assoc();

        if ($row) {?>
            <div class="article-list-container">

                <div class="article">
                    <h2><?php echo $row['header']; ?></h2>
                    <p>Дата публикации: <?php echo $row['publish_date']; ?></p>
                    <p><?php echo $row['body']; ?></p>
                    <p><?php echo $row['end']; ?></p>
                </div>
            </div>
       <?php } else {
            echo "Статья с ID $id_article не найдена.";
        }
    } else {
        echo "Ошибка выполнения запроса: " . mysqli_error($con);
    }
} else {
    echo "Не указан ID статьи.";
}?>


    <form action="/handlers/comments.php" method="post">
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="comment">Комментарий:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

        <input type="hidden" name="article_id" value="<?php echo $id_article;?>">

        <input type="submit" value="Отправить">
    </form>
    <style>
        .comments {
            margin-top: 20px;
        }

        .one_com {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .name_user {
            font-weight: bold;
            color: #333;
        }

        .date {
            color: #999;
            font-size: 0.8em;
        }
    </style>
<?php
$sql_com = "SELECT * FROM `comments` WHERE `id_article` = " . $id_article;
$res = mysqli_query($con,$sql_com);
$comments = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>
<?php if ($_SESSION['auth'] == 'true') {?>
    <div class="comments">
        <?php foreach ($comments as $comment) { ?>
            <div class="one_com">
                <p class="name_user"><?php echo $comment['name']?></p>
                <p class="text"><?php echo $comment['text']?></p>
                <p class="date"><?php echo $comment['date']?></p>
            </div>
        <?php }?>
    </div>
    <?php }else {?>
    <p>Комментарии доступны только авторизованным пользователям</p>
    <?php }?>
<?php require_once "../blocks/footer.php";?>