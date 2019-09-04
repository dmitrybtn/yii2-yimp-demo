<?php


namespace app\components;

use app\controllers\CrudController;

class Navigator extends \dmitrybtn\yimp\Navigator
{
    public function init()
    {
        parent::init();

        $this->menuLeft = [
            ['label' => 'Main menu'],
            ['label' => CrudController::titleIndex(), 'url' => ['/crud/index']],
            ['label' => 'API Documentation', 'url' => ['/api']],
        ];

    }
}