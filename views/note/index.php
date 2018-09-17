<?php
use app\objects\NoteAccessChecker;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Note;
use app\objects\viewModels\NoteView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $viewModel NoteView */

$this->title = 'Notes';
$this->params['breadcrumbs'][] = $this->title;

$isAllowedToWriteCallback = function (Note $note) {
    return (new NoteAccessChecker())->isAllowedToWrite($note);
};
?>
    <div class="note-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => \yii\grid\SerialColumn::class],
        'name',
        'text',
        [
            'label' => 'Автор',
            'format' => 'raw',
            'value' => function (Note $model) use ($viewModel) {
            return $viewModel->getUserLink($model);
            }
        ],
        [
            'label' => 'Дата создания',
            'attribute' => 'created_at',
            'format' => ['date', 'php:d.m.Y'],
        ],
        [
            'label' => 'Дата редактирования',
            'attribute' => 'updated_at',
            'format' => ['date', 'php:d.m.Y H:i:s'],
        ],
        			[
        				'format' => 'raw',
        				'value' => function (Note $model) {
            				return Html::a('JSON', ['note/json', 'id' => $model->id]);
        				}
        			],

        [
            'class' => \yii\grid\ActionColumn::class,
            'visibleButtons' => [
                'view' => function (\app\models\Note $model) {
                    return (new NoteAccessChecker())->isAllowedToRead($model);
                },
                'update' => $isAllowedToWriteCallback,
                'delete' => $isAllowedToWriteCallback,
            ],
        ],
    ],
]); ?>
</div>
