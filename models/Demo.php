<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "demo".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 */
class Demo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DemoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DemoQuery(get_called_class());
    }
}
