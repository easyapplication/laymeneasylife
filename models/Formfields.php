<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%formfields}}".
 *
 * @property integer $id
 * @property string $fieldname
 * @property string $title
 * @property string $fieldtype
 * @property string $expression
 * @property string $field_size
 * @property string $field_size_min
 * @property integer $required
 * @property string $error_message
 * @property integer $position
 * @property integer $visible
 * @property string $model
 * @property string $label
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Formfields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formfields}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['required', 'position', 'visible', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fieldname', 'title', 'fieldtype', 'expression', 'error_message', 'model', 'label'], 'string', 'max' => 255],
            [['field_size', 'field_size_min'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fieldname' => Yii::t('app', 'Fieldname'),
            'title' => Yii::t('app', 'Title'),
            'fieldtype' => Yii::t('app', 'Fieldtype'),
            'expression' => Yii::t('app', 'Expression'),
            'field_size' => Yii::t('app', 'Field Size'),
            'field_size_min' => Yii::t('app', 'Field Size Min'),
            'required' => Yii::t('app', 'Required'),
            'error_message' => Yii::t('app', 'Error Message'),
            'position' => Yii::t('app', 'Position'),
            'visible' => Yii::t('app', 'Visible'),
            'model' => Yii::t('app', 'Model'),
            'label' => Yii::t('app', 'Label'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
