<?php

use app\models\Event;
use app\models\User;
use yii\db\Migration;

/**
 * Добавление поля event.author_id и внешнего ключа
 */
class m180904_110020_add_field_event_author_id extends Migration
{
    private const FK_EVENT_AUTHOR_ID = 'fk_event_author_id';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $eventTable = $this->getEventTable();
        $this->addColumn($eventTable, 'author_id', $this->integer());
        $this->addForeignKey(
            self::FK_EVENT_AUTHOR_ID,
            $eventTable,
            'author_id',
            User::tableName(),
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $eventTable = $this->getEventTable();
        $this->dropForeignKey(self::FK_EVENT_AUTHOR_ID, $eventTable);
        $this->dropColumn($eventTable, 'author_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180904_110020_add_field_event_author_id cannot be reverted.\n";

        return false;
    }
    */
    /**
     * @return string
     */
    private function getEventTable(): string
    {
        return Event::tableName();
    }
}
