<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\viewmodels\Formfields;

/* @var $this yii\web\View */
/* @var $model app\viewmodels\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <!-- dynamic fields -->
    <?php
    $fields = Formfields::find()->where(['model' => 'Books'])->all();
    foreach ($fields as $key => $field) {
        //if ($field->form_field_type != NULL) {
          //  $this->render("dynamicfield" , ['model' => $model, 'field' => $field,'form'=>$form]);
          //  
        //}
        echo $form->field($model, $field->fieldname)->textInput(['maxlength' => true]);
    }
    ?>
    <!-- dynamic fields -->



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
