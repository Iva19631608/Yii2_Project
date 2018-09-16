<?php

use yii\db\Migration;

/**
 * Handles the creation of table `access_event`.
 */
class m180911_041635_create_access_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access_event', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_access_event_event_id',
            'access_event', 'event_id',
            'event', 'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk_access_event_user_id',
            'access_event', 'user_id',
            'user', 'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_access_event_event_id', 'access_event');
        $this->dropForeignKey('fk_access_event_user_id', 'access_event');

        $this->dropTable('access_event');
    }
}