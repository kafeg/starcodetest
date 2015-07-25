<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'seriesId') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'issueDateTime') ?>

    <?= $form->field($model, 'endingDateTime') ?>

    <?php // echo $form->field($model, 'lastDateOfUse') ?>

    <?php // echo $form->field($model, 'currentSumm') ?>

    <?php // echo $form->field($model, 'statusId') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
