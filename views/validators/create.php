<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\viewmodels\Validators */

$this->title = Yii::t('app', 'Create Validators');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Validators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="validators-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
