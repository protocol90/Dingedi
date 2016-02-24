<div class="info"><p>Liste des tournois de <strong>Black Ops III sur Xbox one</strong></p></div>
<div class="container">
    <?php
    foreach ($tournaments as $tournament): ?>
        <?php $discipline = Database::select('disciplines', ['id' => $tournament->discipline_id])->fetch(); ?>
        <div class="tournois">
            <span><strong>Date :</strong> <?= date('d/m/Y', strtotime($tournament->date)); ?></span><span>
			<span><strong>Heure :</strong> <?= date('G:i', strtotime($tournament->date)); ?></span><span>
			<span><strong>Discipline </strong> <?= $discipline->name; ?></span><span>
			<span><strong>Entrée
                    :</strong> <?= ($tournament->price == 0) ? 'GRATUIT' : $tournament->price; ?></span><span>
			<span><strong>Place :</strong> 20/250</span><span>
			<span><strong>A gagner :</strong> <?= $tournament->wins; ?> euros</span><span>
			<span><strong>Debut du tournois :</strong><?= date('G:i', strtotime($tournament->date)); ?></span><span>
			<span><strong>Fin du tournois :</strong> 20h45</span><span>
			<div class="inscription"><a href="#">Inscription terminer</a></div>
			<span class="live"><i class="fa fa-circle"></i> Regarder le live</span>
			<a href="#"><i class="fa fa-twitch twitch"></i></a>
			<span class="live"><a href="#">Règles du tournois</a></span>
        </div>
    <?php endforeach; ?>
</div>
