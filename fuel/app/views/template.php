<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php echo Asset::css("bootstrap.min.css"); ?>
    <?php echo Asset::css("todc-bootstrap.css"); ?>
    <?php echo Asset::css("docs.css"); ?>
    <title><?php echo FUELTITLE; ?></title>
</head>
<body>
<div class="wrapper">
    <div id="header">
        <h1><?php echo FUELTITLE; ?></h1>
        <ul class="nav nav-tabs nav-tabs-google">
            <li><?php echo Html::anchor("ticket", "Ticket"); ?></li>
            <li class="active"><?php echo Html::anchor("project", "Project"); ?></li>
        </ul>
    </div>
    <div id="contents">
        <?php echo $content; ?>
    </div>
</div>
</body>
</html>