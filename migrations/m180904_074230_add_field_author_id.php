<?php
use app\models\Note;
use app\models\User;
use yii\db\Migration;

/**
 * Добавление поля note.author_id и внешнего ключа
 */
class m180904_074230_add_field_author_id extends Migration
{

    private const FK_NOTE_AUTHOR_ID = 'fk_note_author_id';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $noteTable = $this->getNoteTable();
        $this->addColumn($noteTable, 'author_id', $this->integer());
        $this->addForeignKey(
            self::FK_NOTE_AUTHOR_ID,
            $noteTable,
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
        $noteTable = $this->getNoteTable();
        $this->dropForeignKey(self::FK_NOTE_AUTHOR_ID, $noteTable);
        $this->dropColumn($noteTable, 'author_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180904_074230_add_field_author_id cannot be reverted.\n";

        return false;
    }
    */
    /**
     * @return string
     */
    private function getNoteTable(): string
    {
        return Note::tableName();
    }
}
