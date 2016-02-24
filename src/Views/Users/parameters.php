<form enctype="multipart/form-data" method="POST">

    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'pseudo', 'placeholder' => 'Modifier votre pseudo', 'label' => 'Pseudo : ', 'span' => Session::get('pseudo')]); ?></div>
    <div
        class='input'><?= Form::input(['style' => 'border:none;margin-bottom:-5px;padding-top:3px;', 'type' => 'file', 'name' => 'avatar', 'label' => 'Modifier son avatar : ', 'span' => '<font style="font-size:10px;font-weight: 700;" color="#ff5e5e">(taille de l\'image 5MO maximum)</font>']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'password', 'name' => 'password', 'placeholder' => 'Votre mot de passe', 'label' => 'Mot de passe : ', 'span' => '**************']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'password', 'name' => 'conf_password', 'placeholder' => 'Confirmer votre mot de passe', 'label' => 'Confirmer mot de passe : ', 'span' => '**************']); ?></div>

    <div class="info"><p>Ci-dessous seront les informations que pourront voir les autres membres</p>
    </div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'gt_xbox', 'placeholder' => 'gamertag xbox live', 'label' => 'Votre gamertag xbox live : ', 'span' => !empty(Session::get('gamertag_xbox')) ? Session::get('gamertag_xbox') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'playstation_network', 'placeholder' => 'Playstation Network', 'label' => 'Votre Playstation Network : ', 'span' => !empty(Session::get('playstation_network')) ? Session::get('playstation_network') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'steam', 'placeholder' => 'Votre Steam', 'label' => 'Votre Steam : ', 'span' => !empty(Session::get('steam')) ? Session::get('steam') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'youtube', 'placeholder' => 'Votre chaine Youtube', 'label' => 'Votre chaine youtube : ', 'span' => !empty(Session::get('youtube')) ? Session::get('youtube') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'twitter', 'placeholder' => 'Votre Twitter', 'label' => 'Votre twitter : ', 'span' => !empty(Session::get('twitter')) ? Session::get('twitter') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'facebook', 'placeholder' => 'Votre facebook', 'label' => 'Votre page Facebook : ', 'span' => !empty(Session::get('facebook')) ? Session::get('facebook') : 'NON RENSEIGNER']); ?></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'twitch', 'placeholder' => 'Votre twitch', 'label' => 'Votre chaine Twitch : ', 'span' => !empty(Session::get('twitch')) ? Session::get('twitch') : 'NON RENSEIGNER']); ?></div>
    <div class="info"><p>Vous avez un code pour devenir <font
                style="font-weight: 700;" color="#ff4500">V.I.P</font>
            ecrivez le ci dessous</p></div>
    <div
        class='input'><?= Form::input(['type' => 'text', 'name' => 'vip', 'placeholder' => 'Code VIP', 'label' => 'Votre code V.I.P : ']) ?></div>
    <div
        class='input'><?= Form::input(['type' => 'submit', 'name' => 'update_profil', 'value' => 'Enregistrer les modifications']); ?></div>

</form>