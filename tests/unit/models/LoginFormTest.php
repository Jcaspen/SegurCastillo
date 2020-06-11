<?php

namespace tests\unit\models;

use app\models\LoginForm;

class LoginFormTest extends \Codeception\Test\Unit
{
    private $model;

    protected function _after()
    {
        \Yii::$app->user->logout();
    }

    public function testLoginNoUser()
    {
        $this->model = new LoginForm([
            'usuario' => 'not_existing_username',
            'contraseña' => 'not_existing_password',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
    }

    // public function testLoginWrongPassword()
    // {
    //     $this->model = new LoginForm([
    //         'usuario' => 'admin',
    //         'contraseña' => 'wrong_password',
    //     ]);
    //
    //     expect_not($this->model->login());
    //     expect_that(\Yii::$app->user->isGuest);
    //     expect($this->model->errors)->hasKey('password');
    // }

    public function testLoginCorrect()
    {
        $this->model = new LoginForm([
            'usuario' => 'admin',
            'contraseña' => 'admin',
        ]);


        expect($this->model->errors)->hasntKey('password');
    }

}
