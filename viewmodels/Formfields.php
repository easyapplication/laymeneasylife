<?php

namespace app\viewmodels;

use Yii;
use app\models\Formfields as ParentFormField;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Formfields extends ParentFormField {

    const VISIBLE_ALL = 3;
    const VISIBLE_REGISTER_USER = 2;
    const VISIBLE_ONLY_OWNER = 1;
    const VISIBLE_NO = 0;
    const REQUIRED_NO = 0;
    const REQUIRED_YES = 1;
    const REQUIRED_NO_SHOW_REG = 2;
    const REQUIRED_YES_NOT_SHOW_REG = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%formfields}}';
    }

    public function behaviors() {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
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
