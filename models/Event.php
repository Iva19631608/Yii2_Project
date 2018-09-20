<?php

namespace app\models;

use app\models\query\EventQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "event".
 *
 * @property int $id ID
 * @property string $name Название мероприятия
 * @property string $start_at Дата начала
 * @property string $end_at Дата конца
 * @property string $create_at
 * @property string $update_at
 * @property int $author_id
 * @property User $author
 */
class Event extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_at', 'end_at', 'create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название мероприятия',
            'start_at' => 'Дата начала',
            'end_at' => 'Дата конца',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
    /**
     * @inheritdoc
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if (!$this->author_id) {
            $this->author_id = \Yii::$app->user->getId();
        }

        return true;
    }
    /**
     * @inheritdoc
     * @return \app\models\query\EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\EventQuery(get_called_class());
    }
    /**
     * @return ActiveQuery
     */
    public function getAuthor(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
    /**
     * @return ActiveQuery
     */
    public function getAccessevent(): ActiveQuery
    {
        return $this->hasMany(AccessEvent::class, ['event_id' => 'id']);
    }
}
