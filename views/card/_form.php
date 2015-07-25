<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Series;
use app\models\Status;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seriesId')->dropDownList(ArrayHelper::map(Series::find()->asArray()->all(), 'id', 'seriesName')) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'issueDateTime')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'endingDateTime')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'lastDateOfUse')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

    <?= $form->field($model, 'currentSumm')->textInput() ?>

    <?= $form->field($model, 'statusId')->dropDownList(ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'statusName')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
