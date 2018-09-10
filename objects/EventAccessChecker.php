<?php
namespace app\objects;
use app\models\Accessevent;
use app\models\Event;

class EventAccessChecker
{
    /**
     * @param Event $event
     *
     * @return bool
     */
    public function isAllowedToWrite(Event $event): bool
    {
        return \Yii::$app->user->getId() === (int)$event->author_id;
    }
    /**
     * @param Event $event
     *
     * @return bool
     */
    public function isAllowedToRead(Event $event): bool
    {
        if ($this->isAllowedToWrite($event)) {
            return true;
        }
        $userId = \Yii::$app->user->getId();
        $count = (int)Accessevent::find()
            ->andWhere(
                [
                    'event_id' => $event->id,
                    'user_id' => $userId,
                ]
            )
            ->count('id');
        return $count > 0;
    }
}