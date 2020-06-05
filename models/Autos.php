<?php

namespace app\models;

/**
 * This is the model class for table "autos".
 *
 * @property int $id
 * @property int $poliza
 * @property string $tomador_dni
 * @property string $tipo_auto
 * @property string $marca
 * @property string $modelo
 * @property string $matricula
 * @property string $caballos
 * @property string $tipo_poliza
 * @property string $capital_asegurado
 * @property string $prima
 *
 * @property Clientes $tomadorDni
 */
class Autos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tomador_dni', 'marca', 'modelo', 'agente'], 'required'],
            [['caballos', 'capital_asegurado', 'prima'], 'number'],
            [['tomador_dni'], 'string', 'max' => 9],
            [['tipo_auto', 'marca', 'modelo', 'matricula', 'tipo_poliza'], 'string', 'max' => 255],
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
            'tipo_auto' => 'Tipo Auto',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'matricula' => 'Matricula',
            'caballos' => 'Caballos',
            'tipo_poliza' => 'Tipo Poliza',
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
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('autos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgente()
    {
        return $this->hasOne(Usuarios::className(), ['login' => 'agente'])->inverseOf('autos');
    }
}
