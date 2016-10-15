<?php

namespace app\viewmodels;

use Yii;
use app\models\Books as ParentModel;
use app\viewmodels\Formfields;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Books extends ParentModel {

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
    public function attributeLabels() {
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

        $model = Formfields::find()->where(['model' => 'Books'])->all();

        return $model;
    }

}
