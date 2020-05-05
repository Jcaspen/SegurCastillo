<?php

namespace app\models;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id
 * @property int $poliza
 * @property string $cif
 * @property string $tomador_dni
 * @property string $facturacion_anual
 * @property string $capital_asegurado
 * @property string $prima
 *
 * @property Clientes $tomadorDni
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cif', 'tomador_dni', 'facturacion_anual'], 'required'],
            [['capital_asegurado', 'prima'], 'number'],
            [['cif', 'tomador_dni'], 'string', 'max' => 9],
            [['facturacion_anual'], 'string', 'max' => 255],
            [['cif'], 'unique'],
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
            'poliza' => 'Poliza',
            'cif' => 'Cif',
            'tomador_dni' => 'Tomador Dni',
            'facturacion_anual' => 'Facturacion Anual',
            'capital_asegurado' => 'Capital Asegurado',
            'prima' => 'Prima',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTomadorDni()
    {
        return $this->hasOne(Clientes::className(), ['dni' => 'tomador_dni'])->inverseOf('empresas');
    }
}
