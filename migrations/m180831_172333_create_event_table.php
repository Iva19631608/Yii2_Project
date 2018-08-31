<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m180831_172333_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string()->comment('Название мероприятия'),
            'start_at' => $this->timestamp()->defaultExpression('NOW()')->comment('Дата начала'),
            'end_at' => $this->timestamp()->defaultExpression('NOW()')->comment('Дата конца'),
            'create_at' => $this->timestamp(),
            'update_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event');
    }
}
