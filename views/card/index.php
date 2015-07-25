<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Series;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Card'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'series.seriesName',
            [
                'attribute' => 'seriesId',
                'value' => 'series.seriesName',
                'filter' => Html::activeDropDownList($searchModel, 'seriesId',
                    ArrayHelper::map(Series::find()->asArray()->all(), 'id', 'seriesName'),
                    ['class'=>'form-control','prompt' => 'Выбрать серию']),
            ],
            'number',
            'issueDateTime',
            'endingDateTime',
            'lastDateOfUse',
            'currentSumm',
            //'status.statusName',
            [
                'attribute' => 'statusId',
                'value' => 'status.statusName',
                'filter' => Html::activeDropDownList($searchModel, 'statusId',
                    ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'statusName'),
                    ['class'=>'form-control','prompt' => 'Выбрать статус']),
            ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
