<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\viewmodels\SearchFormfields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formfields-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fieldname') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'fieldtype') ?>

    <?= $form->field($model, 'expression') ?>

    <?php // echo $form->field($model, 'field_size') ?>

    <?php // echo $form->field($model, 'field_size_min') ?>

    <?php // echo $form->field($model, 'required') ?>

    <?php // echo $form->field($model, 'error_message') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
