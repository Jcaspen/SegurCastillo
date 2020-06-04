<?php

namespace app\models;

/**
 * This is the model class for table "vida".
 *
 * @property int $id
 * @property int $poliza
 * @property string $tomador_dni
 * @property string $ocupacion
 * @property string $ingresos_anuales
 * @property string $tipo_poliza
 * @property string $ingreso_mensual
 * @property string $capital
 * @property string $cuestionario
 * @property string $prima
 *
 * @property Clientes $tomadorDni
 */
class Vida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tomador_dni', 'ocupacion', 'cuestionario', 'agente'], 'required'],
            [['ingreso_mensual', 'capital', 'cuestionario', 'prima'], 'number'],
            [['tomador_dni'], 'string', 'max' => 9],
            [['ocupacion', 'ingresos_anuales', 'tipo_poliza'], 'string', 'max' => 255],
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
            'ocupacion' => 'Ocupacion',
            'ingresos_anuales' => 'Ingresos Anuales',
            'tipo_poliza' => 'Tipo Poliza',
            'ingreso_mensual' => 'Ingreso Mensual',
            'capital' => 'Capital',
            'cuestionario' => 'Cuestionario',
            'prima' => 'Prima',
            'agente' => 'Agente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTomadorDni()
    {
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('vida');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgente()
    {
        return $this->hasOne(Usuarios::className(), ['login' => 'agente'])->inverseOf('vida');
    }
}
