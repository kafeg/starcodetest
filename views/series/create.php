<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Series */

$this->title = Yii::t('app', 'Create Series');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="series-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
