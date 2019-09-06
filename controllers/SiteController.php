<?php

namespace app\controllers;

use Yii;
use app\components\Controller;

class SiteController extends Controller
{
    const TITLE_INDEX = 'Index action';

    const TITLE_SECOND = 'Second action';


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

    public static function menuRight()
    {
        return [
            ['label' => 'Options'],
            ['label' => static::TITLE_INDEX, 'url' => ['/site/index']],
            ['label' => static::TITLE_SECOND, 'url' => ['/site/second']],
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

        $this->nav->menuRight = static::menuRight();

        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionSecond()
    {
        $this->nav->title = static::TITLE_SECOND;
        $this->nav->menuRight = static::menuRight();

        return $this->render('second');
    }
}
