<?php

class PainelController extends Controller
{
  public function index ()
  {
    $this->render('painel', [
      'page_title' => 'Painel'
    ]);
  }
}
