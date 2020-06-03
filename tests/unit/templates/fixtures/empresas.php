<?php

/**
 * @tests/unit/templates/fixtures/empresas.php
 *
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
    'cif' => $faker->unique()->dni,
    'tomador_dni' => $faker->dni,
    'facturacion_anual' => $faker->randomNumber($nbDigits = NULL, $strict = false),
    'capital_asegurado' => $faker->randomNumber($nbDigits = NULL, $strict = false),
    'prima' => $faker->randomNumber($nbDigits = NULL, $strict = false),
];
