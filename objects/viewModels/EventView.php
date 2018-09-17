<?php
namespace app\objects\viewModels;
use app\models\Event;
use app\objects\EventAccessChecker;
use yii\helpers\Html;
use yii\caching\DbDependency;

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
    /**
     * @return array
     */
    public function getCacheParams(): array
    {
        $dependency = new DbDependency();
        $dependency->sql = 'SELECT COUNT(id) FROM event';
        return [
            'duration' => 3600,
            'dependency' => $dependency
        ];
    }
}