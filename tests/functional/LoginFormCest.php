<?php

class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }


    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[usuario]' => '',
            'LoginForm[contraseña]' => '',]);
        $I->expectTo('see validations errors');
        $I->see('Usuario no puede estar vacío.');
        $I->see('Contraseña no puede estar vacío.');
    }

    public function loginWithWrongCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[usuario]' => 'fer',
            'LoginForm[contraseña]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Usuario o contraseña incorrecta.');
    }

    // public function loginSuccessfully(\FunctionalTester $I)
    // {
    //     $I->submitForm('#login-form', [
    //         'LoginForm[usuario]' => 'agente',
    //         'LoginForm[contraseña]' => 'agente',
    //     ]);
    //     $I->see('Logout (agente)');
    //     $I->dontSeeElement('form#login-form');
    // }
}
