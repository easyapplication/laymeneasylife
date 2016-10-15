<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\viewmodels\Formfields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formfields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'fieldname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

 
    <?=
    $form->field($model, 'fieldtype')->dropDownList([
        \yii\helpers\ArrayHelper::map(\app\viewmodels\Validators::find()->where(['active' => 1])->all(), 'name', 'name')
    ])
    ?>


    <?= $form->field($model, 'expression')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_size')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'field_size_min')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'required')->checkbox() ?>

    <?= $form->field($model, 'error_message')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'position')->textInput() ?>

    <?php //echo $form->field($model, 'visible')->checkbox() ?>

    <?=
    $form->field($model, 'model')->dropDownList([
        \yii\helpers\ArrayHelper::map(\app\viewmodels\Models::find()->all(), 'model', 'model')
    ])
    ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
