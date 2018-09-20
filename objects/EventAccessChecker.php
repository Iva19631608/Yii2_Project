<?php
namespace app\objects;
use app\models\AccessEvent;
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
        $count = (int)AccessEvent::find()
            ->andWhere(
                [
                    'event_id' => $event->id,
                    'user_id' => $userId,
                ]
            )
            ->count('id');
        return $count > 0;
    }
    /**
     * @param Event $event
     *
     * @return bool
     */
    public function isAllowedToUpdate(Event $event): bool
    {
        return $this->isAllowedToWrite($event) && (strtotime($event->start_at) >= time());
    }
}