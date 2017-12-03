<?php

namespace greeschenko\prozorrostandarts\controllers;

use Yii;
use yii\web\Controller;
use greeschenko\prozorrostandarts\models\Standarts;

class MainController extends Controller
{
    public function actionSync()
    {
        $model = Standarts::deleteAll();

        foreach ($this->module->types as $type => $url) {
            $data = file_get_contents($url);

            $data = json_decode($data, true);

            if (count($data) != 0) {
                foreach ($data as $key => $value) {
                    if (is_array($value)) {
                        $value = $value['name_uk'];
                    }
                    $model = new Standarts();
                    $model->key = $key;
                    $model->value = $key.' - '.$value;
                    $model->type = $type;
                    if (!$model->save()) {
                        throw new \yii\web\HttpException(500, json_encode($model->errors, JSON_UNESCAPED_UNICODE));
                    }
                }
            }
        }


        return true;
    }
}
