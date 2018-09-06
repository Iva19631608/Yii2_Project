<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accessevent`.
 */
class m180906_112201_create_accessevent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('accessevent', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_accessevent_event_id',
            'accessevent', 'event_id',
            'event', 'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk_accessevent_user_id',
            'accessevent', 'user_id',
            'user', 'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_accessevent_event_id', 'accessevent');
        $this->dropForeignKey('fk_accessevent_user_id', 'accessevent');

        $this->dropTable('accessevent');
    }
}
