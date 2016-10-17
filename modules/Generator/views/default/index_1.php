<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;


/* @var $this \yii\web\View */
/* @var $generators \yii\gii\Generator[] */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$this->title = 'Welcome to Gii';
?>
<div class="default-index">
    <div class="page-header">
        <h1>Welcome to Laymen Code Generator <small>a magical tool that can write code for you</small></h1>
    </div>

    <p class="lead">Start the fun with the following code generators:</p>

    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'id' => "laymen-generator",
                    'successCssClass' => '',
                    'fieldConfig' => ['class' => ActiveField::className()],
        ]);

        echo $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]);
       
        echo Html::submitButton('Preview', ['name' => 'preview', 'class' => 'btn btn-primary']);
        ActiveForm::end();
        ?>
    </div>

    <!--<p><a class="btn btn-success" href="http://www.yiiframework.com/extensions/?tag=gii">Get More Generators</a></p>-->

</div>
