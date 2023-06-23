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
      $I->amOnPage('./html/index.html');
      $I->click('Entrar');
      $I->seeCurrentURLEquals('./html/login.html');
      $I->see('CPF / CNPJ');
    }
}
