<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
use app\coreviewmodels\Formfields;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->phpType} \${$column->name}\n" ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
    public function behaviors() {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * @inheritdoc
     */
    public function rules()
    {
         $rules = [];
          $model = $this->getFields();
        $counter = 0;
        foreach ($model as $field) {
            if ($field->required == "1") {
                $rules[$counter] = strlen($field->error_message) > 0 ? [[$field->fieldname], "required", "message" => $field->error_message] : [[$field->fieldname], "required"];
                $counter++;
            }
            if ($field->fieldtype == "match") {
                $rules[$counter] = strlen($field->error_message) > 0 ? [[$field->fieldname], 'match', 'pattern' => $field->expression, "message" => $field->error_message] : [[$field->fieldname], 'match', 'pattern' => $field->expression];
                $counter++;
            } else {
                $rules[$counter] = strlen($field->error_message) > 0 ? [[$field->fieldname], $field->fieldtype, "message" => $field->error_message] : [[$field->fieldname], $field->fieldtype];
                $counter++;
            }
        }
        return $rules;
    
      
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
         $attributes = [
            'id' => Yii::t('app', 'ID'),
            'created_at' => Yii::t('app', 'Datetime created'),
            'updated_at' => Yii::t('app', 'Datetime updated'),
            'created_by' => Yii::t('app', 'Created by'),
            'update_by' => Yii::t('app', 'Updated by'),
        ];

        $model = $this->getFields();
        foreach ($model as $field) {
            if (strlen($field->label) > 0)
                $attributes[$field->fieldname] = $field->label;
        }
        return $attributes;
    }
     //Get the fiedls from form_fields	
    public function getFields() {

        $model = Formfields::find()->where(['model' => '<?= $className ?>'])->all();

        return $model;
    }
    
<?php foreach ($relations as $name => $relation): ?>

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
<?php endforeach; ?>
<?php if ($queryClassName): ?>
<?php
    $queryClassFullName = ($generator->ns === $generator->queryNs) ? $queryClassName : '\\' . $generator->queryNs . '\\' . $queryClassName;
    echo "\n";
?>
    /**
     * @inheritdoc
     * @return <?= $queryClassFullName ?> the active query used by this AR class.
     */
    public static function find()
    {
        return new <?= $queryClassFullName ?>(get_called_class());
    }
<?php endif; ?>
}
