<?php

namespace app\coreviewmodels;

use Yii;
use app\models\Validators as ParentModel;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%validators}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $class
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $active
 */
class Validators extends ParentModel
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
        return '{{%validators}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['class'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'class' => Yii::t('app', 'Class'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}