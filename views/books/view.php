<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\viewmodels\Formfields;

$dynamicfield = Formfields::find()->where(['model' => 'Books'])->all();

/* @var $this yii\web\View */
/* @var $model app\viewmodels\Books */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?php
    $attributes = [
        'id',
    ];

    foreach ($dynamicfield as $field)
        array_push($attributes, $field->fieldname);

    array_push($attributes, 'created_at:datetime', 'updated_at:datetime', [
        'attribute' => 'created_by',
        'value' => 'Hikmat Ullah',
            ], [
        'attribute' => 'updated_by',
        'value' => 'Hikmat Ullah',
    ]);

    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ])
    ?>

</div>
