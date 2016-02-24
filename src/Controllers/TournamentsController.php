<?php

class TournamentsController extends Controller
{

    public function createAction()
    {
        if (Session::get('vip') == 0) {
            Tools::redirect(Html::link('vip/buy'));
            exit();
        }

        if (isset($_POST['create_tournament'])) {
            $title = Security::post('tournament_name');
            $date = Security::post('date');
            $heure = Security::post('heure');
            $minutes = Security::post('minutes');
            $disciplines = Security::post('disciplines');
            $twitch = Security::post('twitch');
            $consoles = Security::post('consoles');
            $jeux = Security::post('jeux');

            $newTime = strtotime("$date $heure:$minutes");
            $newTime = date('Y-m-d H:i:s', $newTime);

            if ($date != '' && $date != '' && $heure != '' && $minutes != '' && $disciplines != '' && $title != '' && $jeux != '' && $consoles != '') {
                Database::insert('tournaments', [
                    'title' => $title,
                    'user_id' => Session::get('id'),
                    'date' => $newTime,
                    'discipline_id' => $disciplines,
                    'jeu_id' => $jeux,
                    'console_id' => $consoles,
                    'twitch' => $twitch]);
                Flash::setFlash(Alert::success('Votre tournoi a bien été enregistrer'));
                Tools::redirect(Html::link("/vip"), 0);
                exit();
            }
        }

        $disciplines = Database::select('disciplines', 'all')->fetchAll();
        $consoles = Database::select('consoles', 'all')->fetchAll();
        $jeux = Database::select('jeux', 'all')->fetchAll();

        return $this->render('tournaments@create', array(
            'disciplines' => $disciplines,
            'consoles' => $consoles,
            'jeux' => $jeux
        ));
    }

    public function tournamentsAction($console, $game)
    {
        $tournaments = Database::select('tournaments', ['console_id' => $console, 'jeu_id' => $game],'ORDER BY date DESC')->fetchAll();

        return $this->render('tournaments@list', array(
            'tournaments' => $tournaments
        ));
    }

}