<?php $consoles = Database::select('consoles', 'all')->fetchAll(); ?>
<div id="navbar-left">
    <a href="<?= Html::link('/'); ?>">
        <div class="navbar-title">Dingedi</div>
    </a>
    <?php if (Session::isLogged()): ?>
        <div class="user">
            <img src="<?= BASE_WEB ?>web/img/avatar/<?= Session::get('avatar'); ?>" alt="" class="avatar">
            <p class="username">Bonjour
                <strong><?= Session::get('pseudo'); ?></strong><?php if (Session::get('vip') == 1): echo '<i class="fa fa-star vip"></i>'; endif; ?>
            </p>
            <a href="<?= Html::link('logout'); ?>" class="logout">Déconnexion</a>
        </div>
    <?php endif; ?>

    <li><a href="<?= Html::link(''); ?>"><span class="fa fa-home"></span> Accueil</a></li>
    <li submenu="consoles"><a href="#"><span class="fa fa-sitemap"></span> Tous les tournois <span
                class="fa fa-angle-right arrow"></span></a></li>
    <?php foreach ($consoles as $console): ?>
        <div class="submenu submenu-consoles">
            <li submenu="<?= $console->name; ?>"><a href="#"><?= $console->name; ?> <span
                        class="fa fa-angle-right arrow"></span></a></li>
            <div class="submenu submenu-<?= $console->name; ?>">
                <?php
                $games = Database::select('jeux', ['console_id' => $console->id])->fetchAll();
                ?>
                <?php foreach ($games as $game): ?>
                    <li><a href="<?= Html::link("/tournaments/$console->id/$game->id"); ?>"><?= $game->name; ?></a></li>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <li submenu="medias"><a href="#"><span class="fa fa-rss"></span> Medias <span
                class="fa fa-angle-right arrow"></span></a></li>
    <div class="submenu submenu-medias">
        <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
        <li><a href="#"><span class="fa fa-twitch"></span> Twitch</a></li>
        <li><a href="#"><span class="fa fa-facebook-square"></span> Facebook</a></li>
        <li><a href="#"><span class="fa fa-twitter-square"></span> Twitter</a></li>
    </div>
</div>