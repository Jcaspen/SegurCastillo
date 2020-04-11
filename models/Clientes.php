<?php

namespace app\models;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nombre
 */
class Clientes extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'required'],
            [['dni'], 'required'],
            [['dni'], 'string', 'max' => 9],
            [['dni'], 'unique'],
            [['nombre'], 'required'],
            [['telefono'], 'safe'],
            [['fecha_nac'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha_nac' => 'Fecha de nacimiento',
        ];
    }
}
