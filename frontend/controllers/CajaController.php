<?php

namespace frontend\controllers;

use frontend\models\Caja;
use frontend\models\CajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Categoria;
use frontend\models\Cliente;
use Yii;


/**
 * CajaController implements the CRUD actions for Caja model.
 */
class CajaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Caja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CajaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caja model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Caja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Caja();
        $model->fecha = date('Y-m-d H:i:s');

        $model->tipo = Yii::$app->request->get('dato');

        $modelCategoria = new Categoria();
        $modelCategoria = Categoria::find()->all();
        $catDesplegable = [];
        foreach($modelCategoria as $cat){
            $catDesplegable[$cat['id']] = $cat['descripcion'];
        }
        //var_dump($catDesplegable); die();
        $modelCliente = new Cliente();
        $modelCliente = Cliente::find()->all();
        $clientesDesplegable = [];
        foreach($modelCliente as $cliente){
            $clientesDesplegable[$cliente->id] = $cliente->nombre.' '.$cliente->apellido;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'catDesplegable' => $catDesplegable,
            'clientesDesplegable' => $clientesDesplegable,
        ]);
    }

    /**
     * Updates an existing Caja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        $modelCategoria = new Categoria();
        $modelCategoria = Categoria::find()->all();
        $catDesplegable = [];
        foreach($modelCategoria as $cat){
            $catDesplegable[$cat['id']] = $cat['descripcion'];
        }

        $modelCliente = new Cliente();
        $modelCliente = Cliente::find()->all();
        $clientesDesplegable = [];
        foreach($modelCliente as $cliente){
            $clientesDesplegable[$cliente->id] = $cliente->nombre.' '.$cliente->apellido;
        }




        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'catDesplegable' => $catDesplegable,
            'clientesDesplegable' => $clientesDesplegable,
        ]);
    }

    /**
     * Deletes an existing Caja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Caja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caja::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
