<?php

namespace app\controllers;

use app\components\Controller;
use Yii;
use app\models\Demo;
use app\models\DemoSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * DemoController implements the CRUD actions for Demo model.
 */
class CrudController extends Controller
{
    /**
     * Title for Index action
     */
    public static function titleIndex()
    {
        return Yii::t('app', 'CRUD Example');
    }

    /**
     * Title for View action
     */
    public static function titleView(Demo $model)
    {
        return $model->name;
    }

    /**
     * Title for Create action
     */
    public static function titleCreate()
    {
        return Yii::t('app', 'Create');
    }

    /**
     * Title for Update action
     */
    public static function titleUpdate()
    {
        return Yii::t('app', 'Update');
    }

    /**
     * Title for Delete action
     */
    public static function titleDelete()
    {
        return Yii::t('app', 'Delete');
    }

    /**
     * Breadcrumbs to Index action
     */
    public static function crumbsToIndex()
    {
        return [
            ['label' => static::titleIndex(), 'url' => ['index']]
        ];
    }

    /**
     * Breadcrumbs to View action
     */
    public static function crumbsToView(Demo $model)
    {
        return array_merge(static::crumbsToIndex(), [
            ['label' => static::titleView($model), 'url' => ['view', 'id' => $model->id]],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Demo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DemoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->nav->title = static::titleIndex();

        $this->nav->menuRight = [
            ['label' => Yii::t('app', 'Options')],
            ['label' => static::titleCreate(), 'url' => ['create', 'returnUrl' => Url::current()]],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $this->nav->title = static::titleView($model);
        $this->nav->crumbs = static::crumbsToIndex();

        $this->nav->menuRight = [
            ['label' => Yii::t('app', 'Options')],
            ['label' => static::titleUpdate(), 'url' => ['update', 'id' => $model->id, 'returnUrl' => Url::current()]],
            ['label' => static::titleDelete(), 'url' => ['delete', 'id' => $model->id], 'linkOptions' => ['data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'POST']]],
        ];

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Demo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($returnUrl, $successUrl = null)
    {
        $model = new Demo();

        // STUB FOR LIVE DEMO
        if (YII_ENV_PROD && $model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('info', 'OK, let\'s think that new contact was created))');
            return $this->redirect($returnUrl);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($successUrl ?: ['view', 'id' => $model->id]);
        }

        $this->nav->title = static::titleCreate();
        $this->nav->crumbs = static::crumbsToIndex();

        return $this->render('create', [
            'model' => $model,
            'cancelUrl' => $returnUrl,
        ]);
    }

    /**
     * Updates an existing Demo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $returnUrl)
    {
        $model = $this->findModel($id);

        // STUB FOR LIVE DEMO
        if (YII_ENV_PROD && $model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('info', 'OK, let\'s think that this contact was updated))');
            return $this->redirect($returnUrl);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($returnUrl);
        }

        $this->nav->title = static::titleUpdate();
        $this->nav->crumbs = static::crumbsToView($model);


        return $this->render('update', [
            'model' => $model,
            'cancelUrl' => $returnUrl,
        ]);
    }

    /**
     * Deletes an existing Demo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $returnUrl = ['index'])
    {
        // STUB FOR LIVE DEMO
        if (YII_ENV_PROD) {
            Yii::$app->session->setFlash('info', 'OK, let\'s think that this contact was deleted))');
            return $this->redirect($returnUrl);
        }

        $this->findModel($id)->delete();

        return $this->redirect($returnUrl);
    }

    /**
     * Finds the Demo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Demo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Demo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
