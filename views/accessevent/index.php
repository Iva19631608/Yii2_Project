<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccessEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accessevents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessevent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Accessevent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                 'label' => 'Событие',
                'format' => 'raw',
                 'value' => function (\app\models\AccessEvent $model){
                 return Html::a($model->event->name,['event/view', 'id' => $model->event_id]);
                 }
            ],
            [
                'label' => 'Пользователь',
                'format' => 'raw',
                'value' => function (\app\models\AccessEvent $model){
                    return Html::a($model->user->username,['user/view', 'id' => $model->user_id]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
