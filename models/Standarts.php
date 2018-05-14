<?php

namespace greeschenko\prozorrostandarts\models;

/**
 * This is the model class for table "{{%standarts}}".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $type
 */
class Standarts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%standarts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value', 'type'], 'required'],
            [['key'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 32],
            [['value'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'type' => 'Type',
        ];
    }

    /**
     * get all items by type.
     */
    public static function getAll($type, $lvl = false)
    {
        $res = [];
        $data = self::find()->where(['type' => $type])->all();

        foreach ($data as $one) {
            if ($lvl) {
                if ($one->key[$lvl] != 0) {
                    $res[$one->key] = $one->value;
                }
            } else {
                $res[$one->key] = $one->value;
            }
        }

        return $res;
    }
}
