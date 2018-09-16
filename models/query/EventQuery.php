<?php

namespace app\models\query;

use yii\db\ActiveQuery;

class EventQuery extends ActiveQuery
{
    /**
     * Фильтрует мероприятия, доступные текущему пользователю
     *
     * @return self
     */
    public function forCurrentUser(): self
    {
        $user = \Yii::$app->getUser();
        $this
            ->joinWith('accessevent', true)
            ->andWhere([
                'or',
                ['=', 'event.author_id', $user->getId()],
                ['=', 'access_event.user_id', $user->getId()],
            ]);
        return $this;
    }
    /**
     * @inheritdoc
     * @return \app\models\Event[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Event|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
