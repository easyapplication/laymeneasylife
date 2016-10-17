<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\coreviewmodels\Formfields;


$dynamicfield = Formfields::find()->where(['model' => '<?=substr($generator->modelClass, strpos($generator->modelClass, "models\\") + 7)?>'])->all();
/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

    <p>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= "<?php " ?>
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
            
            
    <?= "?> " ?>
    
    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>

</div>
