<div class="info">
    <p>
        Création d'un tournois<br/><br/>
        Règles SnD (1V1) : <a href="#">Clique ici</a><br/>
        Règles SnD (2V2) : <a href="#">Clique ici</a><br/>
        Règles SnD (3V3) : <a href="#">Clique ici</a><br/>
        Règles SnD (4V4) : <a href="#">Clique ici</a><br/>
        Règles Esport (4V4) : <a href="#">Clique ici</a><br/>
        Règles SnD (1V1) eSniping : <a href="#">Clique ici</a><br/>
        Règles SnD (2V2) eSniping : <a href="#">Clique ici</a><br/>
        Règles SnD (3V3) eSniping : <a href="#">Clique ici</a><br/>
        Règles SnD (4V4) eSniping : <a href="#">Clique ici</a><br/>
        Règles Esport (4V4) eSniping : <a href="#">Clique ici</a>
    </p>
</div>

<form method="POST">

    <div class="input">
        <?= Form::input(['type' => 'text', 'name' => 'tournament_name', 'placeholder' => 'Nom du tournois', 'label' => 'Nom du tournois :  ']); ?>
    </div>

    <div class="input">
        <label for="datepicker">Date du tournois : <span></span></label>
        <input time="date" placeholder="Date du tournois" id="datepicker" name="date">

    </div>

    <div class="input_heure">
        <label style="display:inline-block;" for="datepicker">Heure du tournois : <span></span></label>
        <input style="display:inline-block;" name="heure">
        h
        <input style="display:inline-block;" name="minutes">
    </div>
    <div class="input" id="ct_consoles">
        <label for="Consoles">Console : <span></span></label>
        <select name="consoles">
            <option value="0">Séléctionner une console</option>
            <?php foreach ($consoles as $console): ?>

                <option value="<?= $console->id; ?>"><?= $console->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input" id="ct_games">
        <label for="jeux">Jeu : <span></span></label>
        <select name="jeux">
            <option value="0">Séléctionner un jeux</option>
            <?php foreach ($jeux as $jeu): ?>

                <option consoleId="<?= $jeu->console_id; ?>" value="<?= $jeu->id; ?>"><?= $jeu->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input" id="ct_disciplines">
        <label for="disciplines">Discipline : <span></span></label>
        <select name="disciplines">
            <option value="0">Séléctionner une discipline</option>
            <?php foreach ($disciplines as $discipline): ?>

                <option value="<?= $discipline->id; ?>"><?= $discipline->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="input">
        <label for="twitch">Chaine twitch :
            <span>La chaine sur la quelle seras diffuser le live du tournois</span></label>
        <input type="text" id="twitch" name="twitch">
    </div>

    <div class="input">
        <input type="submit" value="Créer le tournois" name="create_tournament">
    </div>

</form>