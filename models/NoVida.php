<?php

namespace app\models;

/**
 * This is the model class for table "no_vida".
 *
 * @property int $id
 * @property int $poliza
 * @property string $tomador_dni
 * @property string $riesgo
 * @property string $integrantes
 * @property string $tipo_poliza
 * @property string $capital_asegurado
 * @property string $prima
 *
 * @property Clientes $tomadorDni
 */
class NoVida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'no_vida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tomador_dni', 'riesgo', 'integrantes', 'agente'], 'required'],
            [['integrantes', 'capital_asegurado', 'prima'], 'number'],
            [['tomador_dni'], 'string', 'max' => 9],
            [['riesgo', 'tipo_poliza'], 'string', 'max' => 255],
            [['tomador_dni'], 'unique'],
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
            'riesgo' => 'Riesgo',
            'integrantes' => 'Integrantes',
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
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('noVida');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgente()
    {
        return $this->hasOne(Usuarios::className(), ['login' => 'agente'])->inverseOf('noVida');
    }
}
