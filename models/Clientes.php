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
            [['nombre'], 'required', 'on' => self::SCENARIO_CREATE],
            [['dni'], 'required', 'on' => self::SCENARIO_CREATE],
            [['dni'], 'string', 'max' => 9],
            [['dni'], 'unique'],
            [['direccion'], 'safe'],
            [['nombre'], 'required'],
            [['telefono'], 'safe'],
            [['telefono'], 'integer'],
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
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'carnet' => 'Carnéts',
            'polizas' => 'Pólizas',
        ];
    }

    public function getCliente()
    {
        return $this->hasOne(self::className(), ['dni' => 'dni'])->inverseOf('clientes');
    }
}
