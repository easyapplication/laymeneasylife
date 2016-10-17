<?php

namespace app\modules\Generator\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `laymengenerator` module
 */
class DefaultController extends \yii\gii\controllers\DefaultController {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {

        $this->layout = '@app/views/layouts/main';

        $generator = $this->loadGenerator('mymodel');




        if ($generator->load(Yii::$app->request->post())) {

            if ($this->Generatedb($generator->tableName)) {

                $options = [
                    'ns' => 'app\viewmodels',
                    'baseClass' => 'yii\db\ActiveRecord',
                    'db' => 'db',
                    'modelClass' => $generator->tableName,
                    'messageCategory' => 'app'
                ];
                $this->InsertIntoModel($generator->tableName);
                if ($this->GenerateModel($generator, $options)) {
                    $response = $this->GenerateCRUD($this->loadGenerator("mycrud"), $options);
                }
            }
        }


        return $this->render('index', ['generator' => $generator, 'response' => isset($response) ? $response : null]);
    }

    /**
     * Loads the generator with the specified ID.
     * @param string $id the ID of the generator to be loaded.
     * @return \yii\gii\Generator the loaded generator
     * @throws NotFoundHttpException
     */
    protected function loadGenerator($id) {
        if (isset($this->module->generators[$id])) {
            $this->generator = $this->module->generators[$id];
            $this->generator->loadStickyAttributes();
            $this->generator->load(Yii::$app->request->post());

            return $this->generator;
        } else {
            throw new NotFoundHttpException("Code generator not found: $id");
        }
    }

    /**
     * Create table with specified table name.
     * @param string $tblname the name of table to be generated.
     * @return boolean
     * @throws return boolean
     */
    private function Generatedb($tblname) {
        try {
            $query = "CREATE TABLE `" . strtolower($tblname) . "` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `created_at` int(11) DEFAULT NULL,
                            `updated_at` int(11) DEFAULT NULL,
                            `created_by` int(11) DEFAULT NULL,
                            `updated_by` int(11) DEFAULT NULL,
                            PRIMARY KEY (`id`)
                          ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

            $connection = Yii::$app->getDb();
            $command = $connection->createCommand($query);
            $result = $command->queryAll();

            return true;
        } catch (yii\db\Exception $ex) {
            return true;
        }
    }

    /**
     * Insert new model to be generated in Model Table.
     * @param string $model the name of model to be added in model table.
     * @return boolean
     */
    private function InsertIntoModel($model) {

        $models = new \app\coreviewmodels\Models();
        $models->model = ucwords($model);
        $models->activestatus = true;
        return $models->save();
    }

    /**
     * Generate model from database table create in Generatedb().
     * @param object $generator, the generator class object for model creation.
     * @return boolean
     */
    private function GenerateModel($generator, $options) {
        $generator->modelClass = ucwords($generator->tableName);
        $generator->ns = $options['ns'];
        $generator->baseClass = $options['baseClass'];
        $generator->db = $options['db'];
        $generator->useTablePrefix = true;
        $generator->generateRelations = 'all';
        $generator->generateLabelsFromComments = true;
        $generator->generateQuery = false;
        $generator->queryNs = 'app\models';
        $generator->queryClass = '';
        $generator->queryBaseClass = 'yii\db\ActiveQuery';
        $generator->enableI18N = true;
        $generator->messageCategory = $options['messageCategory'];
        $generator->useSchemaName = true;
        if ($generator->validate()) {
            $generator->saveStickyAttributes();
            $files = $generator->generate();

            return $generator->save($files, [$files['0']->id => 1], $results);
        } else
            return false;
    }

    /**
     * Generate crud from model in GenerateModel().
     * @param object $generator, the generator class object for crud creation.
     * @return boolean
     */
    private function GenerateCRUD($generator, $options) {
        $generator->modelClass = $options['ns'] . '\\' . $options['modelClass'];
        $generator->searchModelClass = $options['ns'] . '\\Search' . $options['modelClass'];
        $generator->controllerClass = 'app\\controllers\\' . $options['modelClass'] . 'Controller';
        $generator->baseControllerClass = 'yii\\web\\Controller';
        $generator->indexWidgetType = 'grid';
        $generator->enableI18N = true;
        $generator->enablePjax = true;
        $generator->messageCategory = $options['messageCategory'];

        if ($generator->validate()) {
            $generator->saveStickyAttributes();
            $files = $generator->generate();

            $answers = [];
            foreach ($files as $key => $file) {
                $answers[$files[$key]->id] = '1';
            }

            $params['hasError'] = !$generator->save($files, $answers, $results);
            $params['resultsfinal'] = $results;
            return $results;
        } else
            return false;
    }

//    public function createTable($table, $columns, $options = null) {
//
//        $cols = [];
//
//        foreach ($columns as $name => $type) {
//
//            if (is_string($name)) {
//
//                $cols[] = "\t" . $this->db->quoteColumnName($name) . ' ' . $this->getColumnType($type);
//            } else {
//
//                $cols[] = "\t" . $type;
//            }
//        }
//
//        $sql = 'CREATE TABLE ' . $this->db->quoteTableName($table) . " (\n" . implode(",\n", $cols) . "\n)";
//
//        return $options === null ? $sql : $sql . ' ' . $options;
//    }
}
