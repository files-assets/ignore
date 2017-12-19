<?php

class ContaController extends Controller
{
  public function entrar ()
  {
    $u = new User();

    if ($u->isLogged()) {
      header('Location: ' . BASE_URL . '/');
    }

    $data = [
      'page_title' => 'Entrar'
    ];

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['token'])) {
      $result = $u->session('login', [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'token'    => $_POST['token']
      ]);

      if (!$result['status']) {
        $data['error'] = $result['response'];
      }

      if ($result['status']) {
        header('Location: ' . BASE_URL . '/painel/');
      }
    }

    $this->render('conta/entrar', $data, false);
  }

  public function sair ()
  {
    $u = new User();

    if (!$u->isLogged()) {
      header('Location: ' . BASE_URL . '/');
    }

    $u->session('logout');

    header('Location: ' . BASE_URL . '/');
  }
}
