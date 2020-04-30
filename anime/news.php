<?php
include "../includes/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>News | Animesaver</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../css/style_news.css">
    </head>
<body>
<?php
    $anime_page = mysqli_query($connection,"SELECT * FROM  `anime` ORDER BY `update_date` DESC LIMIT 0, 20");
?>
    <section class="layout">
        <?php
        while($anime_page_result = mysqli_fetch_assoc($anime_page)){
        ?>
        <div>
            <h3>"<?php echo $anime_page_result['title']; ?>"</h3>
            <p>Все <?php echo $anime_page_result['series'] ?> серий доступны для просмотра.</p>
            <span><?php echo $anime_page_result['update_date']; ?></span>
            <a href="../<?php echo $anime_page_result['link']; ?>" target="_top">Смотреть</a>
        </div>
        <?php }?>
    </section>
</body>
</html>