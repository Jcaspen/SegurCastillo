<?php

namespace app\models;

/**
 * This is the model class for table "hogares".
 *
 * @property int $id
 * @property int $poliza
 * @property string $tomador_dni
 * @property string $direccion
 * @property string $poblacion
 * @property string $provincia
 * @property string $cp
 * @property string $viviendas
 * @property string $metros_cuadrados
 * @property string $capital_asegurado
 * @property string $prima
 *
 * @property Clientes $tomadorDni
 */
class Hogares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hogares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tomador_dni', 'direccion', 'poblacion', 'provincia', 'cp', 'metros_cuadrados', 'agente'], 'required'],
            [['cp', 'viviendas', 'metros_cuadrados', 'capital_asegurado', 'prima'], 'number'],
            [['tomador_dni'], 'string', 'max' => 9],
            [['direccion', 'poblacion', 'provincia'], 'string', 'max' => 255],
            [['tomador_dni'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['tomador_dni' => 'dni']],
            [['agente'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['agente' => 'login']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'poliza' => 'Poliza',
            'tomador_dni' => 'Tomador Dni',
            'direccion' => 'Direccion',
            'poblacion' => 'Poblacion',
            'provincia' => 'Provincia',
            'cp' => 'Cp',
            'viviendas' => 'Viviendas',
            'metros_cuadrados' => 'Metros Cuadrados',
            'capital_asegurado' => 'Capital Asegurado',
            'prima' => 'Prima',
            'agente' => 'Agente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTomadorDni()
    {
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('hogares');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgente()
    {
        return $this->hasOne(Usuarios::className(), ['login' => 'agente'])->inverseOf('hogares');
    }
}
