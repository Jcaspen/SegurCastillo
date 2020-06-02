<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%siniestros}}`.
 */
class m200602_142122_create_siniestros_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%siniestros}}', [
            'id' => $this->primaryKey(),
            'siniestro' => $this->bigint()->defaultValue(0),
            'tomador_dni' => $this->string(9)->notNull()->addForeignKey(
                'fk-siniestros-tomador_dni',
                'siniestros',
                'tomador_dni',
                'clientes',
                'dni',
                'CASCADE'
            ),
            'tipo_poliza' => $this->string(255)->defaultValue('decesos'),
            'capital_desembolsado' => $this->integer(9)->defaultValue(0),
            'observaciones' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%siniestros}}');
    }
}
