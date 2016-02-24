<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dingedi</title>
    <?= Html::css('app'); ?>
</head>
<body>
<div>
    <?= Html::partials('navbar'); ?>
    <?= Html::partials('header'); ?>

    <div id="content">
        <div class="flash">
            <?php Flash::get(); ?>
        </div>
        <div><?= $content_for_layout; ?></div>
    </div>
</div>


<script src='https://www.google.com/recaptcha/api.js'></script>
<?= Html::js('jquery.min'); ?>
<?= Html::js('jquery-ui.min'); ?>
<?= Html::js('app'); ?>
</body>
</html>
