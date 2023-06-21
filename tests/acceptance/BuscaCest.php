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
      $I->amOnPage('/html/login.html');
      $I->fillField('CPF', '123123123');
      $I->click('Entrar');
      $I->see('Digite um CPF completo.');
    }
}
