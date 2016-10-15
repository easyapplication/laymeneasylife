<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\viewmodels\Formfields */

$this->title = Yii::t('app', 'Create Formfields');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formfields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formfields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
