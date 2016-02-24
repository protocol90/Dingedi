<?php

class UsersController extends Controller
{

    public function logoutAction()
    {
        $this->layout = null;
        session_destroy();
        Tools::redirect(Html::link(''));
        exit();
    }

    public function loginAction()
    {
        header('Content-Type: application/json');

        $username = Security::post('username');
        $password = Security::post('password');

        if ($username != '' && $password != '') {
            $req = Database::select('users', ['username' => $username])->fetch(PDO::FETCH_ASSOC);
            $password = Security::hash(Security::post('password'));

            if ($req['password'] == $password) {
                Flash::setFlash(Alert::success("Bonjour " . $req['pseudo'] . " Vous êtes connectez"));
                $_SESSION['user'] = $req;
                echo json_encode(['state' => true]);
            } else {
                echo json_encode(['state' => false]);

            }
        }
    }

    public function registerAction()
    {
        if (isset($_POST['submit_register'])) {
            $users = Database::select('users', 'all')->fetch();
            $vipcodes = Database::select('vipcodes', ['state' => 0])->fetch();

            $username = Security::post('username');
            $pseudo = Security::post('pseudo');
            $mail = Security::post('mail');
            $mail_confirm = Security::post('mail_confirm');
            $pass = Security::post('pass');
            $pass_confirm = Security::post('pass_confirm');

            if ($username != '' && $pseudo != '' && $mail != '' && $mail_confirm != '' && $pass != '' && $pass_confirm != '') {
                if ($mail_confirm == $mail) {
                    if ($pass == $pass_confirm) {
                        if ($users->username != $username) {
                            if ($users->pseudo != $pseudo) {
                                if ($users->email != $mail) {

                                    Database::insert('users', [
                                        'username' => $username,
                                        'pseudo' => $pseudo,
                                        'password' => Security::hash($pass),
                                        'email' => $mail,
                                        'avatar' => 'default.png',
                                        'admin' => 0,
                                        'vip' => 0
                                    ]);

                                    Flash::setFlash(Alert::success('Votre inscription à été enregistrer'));
                                    Tools::redirect(Html::link(''));
                                    exit();
                                } else {

                                }
                                Flash::setFlash(Alert::error('Adresse email déjà utilisé'));
                            } else {
                                Flash::setFlash(Alert::error('Le pseudo est déjà utilisé'));
                            }
                        } else {
                            Flash::setFlash(Alert::error('Le nom d\'utilisateur est déjà utilisé'));
                        }
                    } else {
                        Flash::setFlash(Alert::error('Les mot de passes ne correspondent pas'));
                    }
                } else {
                    Flash::setFlash(Alert::error('Les emails ne correspondent pas'));
                }
            } else {
                Flash::setFlash(Alert::error('Veuillez remplir tout les champs'));
            }

        }

        $disableMessage = true;
        return $this->render('users@register', array(
            'disableMessage' => $disableMessage
        ));
    }

    public function parametersAction()
    {

        if (isset($_POST['update_profil'])) {

            $id = Session::get('id');

            $pseudo = Security::post('pseudo');
            $avatar = $_FILES['avatar'];
            $password = Security::hash(Security::post('password'));
            $conf_password = Security::hash(Security::post('conf_password'));
            $gt = Security::post('gt_xbox');
            $playstation_network = Security::post('playstation_network');
            $steam = Security::post('steam');
            $youtube = Security::post('youtube');
            $twitter = Security::post('twitter');
            $facebook = Security::post('facebook');
            $twitch = Security::post('twitch');
            $vip = Security::post('vip');

            $req = Database::select('users', 'all')->fetch();

            if ($pseudo != '') {
                if (strlen($pseudo) <= 8) {
                    Database::update('users', ['pseudo' => $pseudo], ['id' => $id]);

                    Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                    Tools::redirect(Html::link('accounts/parameters'), 0);
                    exit();
                } else {
                    echo Alert::error('error');
                }
            }

            if ($gt != '') {
                Database::update('users', ['gamertag_xbox' => $gt], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($playstation_network != '') {
                Database::update('users', ['playstation_network' => $playstation_network], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($steam != '') {
                Database::update('users', ['steam' => $steam], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();

            }

            if ($youtube != '') {
                Database::update('users', ['youtube' => $youtube], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($twitter != '') {
                Database::update('users', ['twitter' => $twitter], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($facebook != '') {
                Database::update('users', ['facebook' => $facebook], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($twitch != '') {
                Database::update('users', ['twitch' => $twitch], ['id' => $id]);

                Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                Tools::redirect(Html::link('accounts/parameters'), 0);
                exit();
            }

            if ($password != '' && $conf_password != '') {
                if ($password == $conf_password) {
                    Database::update('users', ['password' => Security::hash($password)], ['id' => $id]);

                    Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                    Tools::redirect(Html::link('accounts/parameters'), 0);
                    exit();
                } else {
                    Flash::setFlash(Alert::error('Les deux mots de passes ne sont pas identiques'));
                }
            }

            if (!empty($avatar['name'])) {
                $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                if (Session::get('avatar') != 'default.png') {
                    unlink(WEB . '/img/avatar/' . Session::get('avatar'));
                }
                if (move_uploaded_file($avatar['tmp_name'], ROOT . '/web/img/avatar/' . sha1(Session::get('pseudo')) . '.' . $ext)) {
                    Database::update('users', ['avatar' => sha1(Session::get('pseudo')) . '.' . $ext], ['id' => $id]);
                    Flash::setFlash(Alert::success('Vos modifications ont bien été enregistrer'));
                    Tools::redirect(Html::link('accounts/parameters'), 0);
                    exit();
                }
            }

        }

        return $this->render('users@parameters');
    }
}