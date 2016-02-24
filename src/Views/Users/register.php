<?php if (!$disableMessage): ?>
    <div class="info">
        <p>
            S'inscrire sur <strong>DINGEDI</strong> vas vous permettre de vous <strong>inscrire à des tournois</strong>,
            <strong>gérer son roster</strong> et bien d'autre encore. Pour vous inscrire rien de plus simple, veuillez
            remplir le formulaire ci-dessous.
        </p>
    </div>
<?php endif; ?>
<form method="POST">

    <div class="input">
        <?= Form::input(['type' => 'text', 'name' => 'username', 'placeholder' => 'Nom de compte', 'label' => 'Nom de compte : ', 'span' => 'Votre nom de compte sera le moyen de vous connectez sur le site.']); ?>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'text', 'name' => 'pseudo', 'placeholder' => 'Pseudo', 'label' => 'Pseudo : ', 'span' => 'Votre pseudo sera vue par les autres membres. <font style="font-size:10px;font-weight: 700;" color="#ff5e5e">(9 caractères maximum espaces compris)</font>']); ?>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'email', 'name' => 'mail', 'placeholder' => 'Adresse e-mail', 'label' => 'Adresse e-mail : ', 'span' => 'Vous en aurez besoin pour vous reconnecter ou si vous devez un jour réinitialiser votre mot de passe']); ?>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'email', 'name' => 'mail_confirm', 'placeholder' => 'Confirmez votre adresse e-mail', 'label' => 'Confirmer votre adresse e-mail : ', 'span' => 'Veuillez retaper votre e-mail à l\'identique.']); ?>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'password', 'name' => 'pass', 'placeholder' => 'Mot de passe', 'label' => 'Mot de passe : ', 'span' => 'Veuillez vous définir un mot de passe. Il servira à la connexion au site.']); ?>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'password', 'name' => 'pass_confirm', 'placeholder' => 'Confirmez votre mot de passe', 'label' => 'Confirmez votre mot de passe : ', 'span' => 'Veuillez retaper votre mot de passe à l\'identique.']); ?>
    </div>
    <div class="input">
        <div class="g-recaptcha" data-sitekey="6LcdDxkTAAAAAC8gHoeK0jbht7O0uVBZ73squ87p"></div>
    </div>
    <div class="input">
        <?= Form::input(['type' => 'submit', 'name' => 'submit_register', 'value' => "S'inscrire"]); ?>
    </div>
</form>

