<div id="navbar-top">
    <div class="logged_navbar">
        <?php if (Session::isLogged()): ?>
            <div class="icons">
                <?php if(Session::get('vip') == 1): ?>
                <a class="vip" href="<?= Html::link('vip'); ?>"><i class="fa fa-star"><span class="vip_hover">VIP</span></i></a>
               <?php endif; ?>
                <a href="#"><i class="fa fa-users"><span class="friends_hover">Mes amis</span></i></a>
                <a href="#"><i class="fa fa-user-plus"><span class="alert-amis">3</span></i></a>
                <a href="#"><i class="fa fa-envelope"><span class="mess_hover">Messagerie</span></i></a>
                <a href="<?= Html::link('accounts/parameters'); ?>"><i class="fa fa-cogs"><span
                            class="param_hover">Paramètres</span></i></a>
                <?php if (Session::get('admin') == 1): ?>
                    <a href="<?= Html::link('admin'); ?>"><i class="fa fa-lock"><span
                                class="admin_hover">Administration</span></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!Session::isLogged()): ?>
        <div class="connexion">
            <form method="post">
                <input type="text" placeholder="Utilisteur ou adresse email" name="username" class="login_username">
                <input type="password" placeholder="Mot de passe" name="password" class="login_password">
                <input type="submit" value="Se connecter" name="connect" class="login_submit"
                       ajax-action="<?= Html::link('api/login'); ?>">
            </form>
        </div>
    <?php endif; ?>
    <div class="register">
        <?php if (Session::isLogged()): ?>
            <a href="<?= Html::link('logout'); ?>"><i class="fa fa-sign-out"></i></a>
        <?php else: ?>
            <a href="register"><i class="fa fa-user-plus"></i></a>
        <?php endif; ?>
    </div>
</div>