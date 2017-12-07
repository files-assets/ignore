<?php
  class ContaController extends Controller
  {
    public function entrar ()
    {
      $u = new User();
      $a = new Auth();

      $data = [
        'page_title' => 'Entrar',
        'token'      => $a->getToken()
      ];

      if ($u->isLogged()) {
        header('Location: ' . BASE_URL . '/');
        exit;
      }

      if (
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['token']) && !empty($_POST['token'])
      ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $token    = $_POST['token'];
        $remember = false;

        if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
          $remember = true;
        }

        $login = $u->login($username, $password, $remember, $token);

        if (!$login['status']) {
          $data['error'] = $login['response'];
        }

        if ($login['status']) {
          header('Location: '. BASE_URL .'/');
          exit;
        }
      }

      $this->render('conta/entrar', $data, false);
    }

    public function sair ()
    {
      $u = new User();
      $a = new Auth();

      $a->destroyToken();
      $u->logout();

      header('Location: ' . BASE_URL . '/');
      exit;
    }
  }
?>
