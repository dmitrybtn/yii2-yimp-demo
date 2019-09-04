<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Demo]].
 *
 * @see Demo
 */
class DemoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Demo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Demo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
