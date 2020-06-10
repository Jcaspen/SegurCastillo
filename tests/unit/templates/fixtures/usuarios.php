<?php

/**
 * @tests/unit/templates/fixtures/usuarios.php
 *
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
    'login' => $faker->unique()->userName,
    'password' => Yii::$app->security->generatePasswordHash('password_' . $index),
    'rol' => Yii::$app->security->generateRandomString(),
];
