<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\viewmodels\Formfields;

$dynamicfield = Formfields::find()->where(['model' => 'Books'])->all();

/* @var $this yii\web\View */
/* @var $searchModel app\viewmodels\SearchBooks */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Books'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $attributes= [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
    ];

    foreach ($dynamicfield as $field)
        array_push($attributes, $field->fieldname);
    
    array_push($attributes, ['class' => 'yii\grid\ActionColumn']);

    Pjax::begin();
    ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $attributes,
    ]);
    ?>
    <?php Pjax::end(); ?></div>
