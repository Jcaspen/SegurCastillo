<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siniestros".
 *
 * @property int $id
 * @property int|null $siniestro
 * @property string $tomador_dni
 * @property string|null $tipo_poliza
 * @property float|null $capital_desenbolsado
 * @property string|null $observaciones
 *
 * @property Clientes $tomadorDni
 */
class Siniestros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siniestros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tomador_dni'], 'required'],
            [['capital_desenbolsado'], 'number'],
            [['tomador_dni'], 'string', 'max' => 9],
            [['tipo_poliza', 'observaciones'], 'string', 'max' => 255],
            [['tomador_dni'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['tomador_dni' => 'dni']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siniestro' => 'Siniestro',
            'tomador_dni' => 'Tomador Dni',
            'tipo_poliza' => 'Tipo Poliza',
            'capital_desenbolsado' => 'Capital Desenbolsado',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * Gets query for [[TomadorDni]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTomadorDni()
    {
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('siniestros');
    }
}
