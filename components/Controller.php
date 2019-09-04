<?php


namespace app\components;


class Controller extends \yii\web\Controller
{
    public $nav;

    public function init()
    {
        parent::init();

        $this->nav = new Navigator;
    }
}