<?php
include "../includes/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Weekly Saver News | Animesaver</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../css/style_news.css">
    </head>
<body>
<?php
    $anime_page = mysqli_query($connection,"SELECT * FROM  `ws_news` ORDER BY `date` DESC LIMIT 0, 15");
?>
    <section class="layout">
        <?php
        while($anime_page_result = mysqli_fetch_assoc($anime_page)){
        ?>
        <div>
            <h3>"<?php echo $anime_page_result['title']; ?>"</h3>
            <img src="../<?php echo $anime_page_result['picture']; ?>" alt="<?php echo $anime_page_result['title'];?> pic" />
            <p><?php echo $anime_page_result['description'] ?></p>
            <span><?php echo $anime_page_result['date']; ?></span>
            <a href="<?php echo $anime_page_result['link']; ?>" target="_blank">Читать</a>
        </div>
        <?php }?>
    </section>
</body>
</html>