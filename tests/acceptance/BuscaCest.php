<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BuscaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function buscarResultadosNaPaginaTest(AcceptanceTester $I)
    { 
      //$I = new AcceptanceTester($scenario);
      $I->amOnPage('/html/login.html');
      $I->click('Entrar');
      $I->see('Digite um CPF ou CNPJ.');
      $I->see('Digite uma senha.');
    }
}
