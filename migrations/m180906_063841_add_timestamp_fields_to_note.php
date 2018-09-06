<?php

use app\models\Note;
use yii\db\Migration;

/**
 * Class m180906_063841_add_timestamp_fields_to_note
 * Добавление колонок created_at и updated_at в таблицу Note
 */
class m180906_063841_add_timestamp_fields_to_note extends Migration
{
    private const FIELD_CREATED_AT = 'created_at';
    private const FIELD_UPDATED_AT = 'updated_at';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = $this->tableName();
        $this->addColumn($tableName, self::FIELD_CREATED_AT, $this->timestamp()->defaultExpression('NOW()'));
        $this->addColumn($tableName, self::FIELD_UPDATED_AT, $this->timestamp()->defaultExpression('NOW()'));
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $tableName = $this->tableName();
        $this->dropColumn($tableName, self::FIELD_CREATED_AT);
        $this->dropColumn($tableName, self::FIELD_UPDATED_AT);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180906_063841_add_timestamp_fields_to_note cannot be reverted.\n";

        return false;
    }
    */
    /**
     * @return string
     */
    private function tableName(): string
    {
        return Note::tableName();
    }
}
