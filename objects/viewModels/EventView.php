<?php
namespace app\objects\viewModels;
use app\models\Event;
use app\objects\EventAccessChecker;
use yii\helpers\Html;

class EventView
{
    /**
     * Является ли текущий пользователь автором мероприятия
     *
     * @param Event $model
     * @return bool
     */
    public function isAuthor(Event $model): bool
    {
        return (new EventAccessChecker)->isAllowedToWrite($model);
    }
    /**
     * @param Event $model
     * @return string
     */
    public function getDateString(Event $model): string
    {
        return date('d.m.Y H:i', strtotime($model->create_at));
    }
    /**
     * @param Event $model
     * @return string
     */
    public function getUserLink(Event $model): string
    {
        return Html::a($model->author->username, ['user/view', 'id' => $model->author_id]);
    }
}