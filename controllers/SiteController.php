<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Navigator;

class SiteController extends Controller
{
    /**
     * @var Navigator
     */
    public $nav;

    public function init()
    {
        parent::init();

        $this->nav = new Navigator();
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'dmitrybtn\yimp\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->nav->title = Yii::$app->name;
        $this->nav->crumbs = false;
        $this->nav->headerDesktop = false;
        $this->nav->headerMobile = 'YIMP';

        return $this->render('index');
    }
}
