<?php require_once "themes/blocks/head.php"?>
<?php require_once "themes/blocks/header.php"?>
<main>
    <h2>Добро пожаловать на нашу страницу!</h2>
    <p>Здесь может быть ваш контент, например, красивые изображения, информация о вашей компании и т.д.</p>

<?php require_once "connect.php"?>
<?php
$items_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;
$sql_articles = "SELECT * FROM `articles` LIMIT $offset, $items_per_page";
$res_art = db_run($sql_articles);
$articles = mysqli_fetch_all($res_art, MYSQLI_ASSOC);

// Отображаем статьи
?>

<div class="article-list-container">
    <?php foreach($articles as $article) {?>
        <div class="article">
            <h2><?php echo $article['header']; ?></h2>
            <p>Дата публикации: <?php echo $article['publish_date']; ?></p>
            <p><?php echo $article['body']; ?></p>
            <p><?php echo $article['end']; ?></p>
            <a href="themes/pages/detail.php/?id=<?php echo $article['id']?>">Подробнее</a>
        </div>
    <?php } ?>
</div>

<?php $count_query = "SELECT COUNT(*) as total FROM `articles`";
$result_pagen =  db_run($count_query);
$data = mysqli_fetch_assoc($result_pagen);
$total_items = $data['total'];
$total_pages =ceil($total_items / $items_per_page);?>

<?php
if ($current_page > 1) {
    echo '<a href="?page='.($current_page - 1).'">Предыдущая</a> ';
}

for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href="?page='.$i.'">'.$i.'</a> ';
}

if ($current_page < $total_pages) {
    echo '<a href="?page='.($current_page + 1).'">Следующая</a>';
}?>
</main>
<script>
function func(num) {
    return function() {
        return num
    }
}
console.log(func(16)())
</script>


<?php require_once "themes/blocks/footer.php"?>