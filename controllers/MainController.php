<?php

namespace greeschenko\prozorrostandarts\controllers;

use yii\web\Controller;
use greeschenko\prozorrostandarts\models\Standarts;

class MainController extends Controller
{
    public function actionSync($type = false)
    {
        set_time_limit(6000);

        if (!$type) {
            $model = Standarts::deleteAll();
            foreach ($this->module->types as $t => $url) {
                self::getOne($url, $t);
            }
        } else {
            $model = Standarts::deleteAll(['type' => $type]);
            self::getOne($this->module->types[$type], $type);
        }

        return true;
    }

    /**
     * get one type standarts.
     */
    private static function getOne($url, $type)
    {
        $data = file_get_contents($url);

        $data = json_decode($data, true);

        if (count($data) != 0) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $value = $value['name_uk'];
                }
                $model = new Standarts();
                $model->key = (string) $key;
                $model->value = $key.' - '.$value;
                $model->type = $type;
                if (!$model->save()) {
                    throw new \yii\web\HttpException(500, json_encode($model->errors, JSON_UNESCAPED_UNICODE));
                }
            }
        }
    }
}
