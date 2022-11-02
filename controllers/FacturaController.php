<?php

namespace app\controllers;

use app\models\Factura;
use app\models\FacturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Detalle;
use app\models\Producto;
use app\models\Cliente;

/**
 * FacturaController implements the CRUD actions for Factura model.
 */
class FacturaController extends Controller
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
     * Lists all Factura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FacturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factura model.
     * @param int $num_factura Num Factura
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($num_factura)
    {
        return $this->render('view', [
            'model' => $this->findModel($num_factura),
            // 'model' => $this->findModelView($num_factura),
        ]);
    }

    /**
     * Creates a new Factura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Factura(); 
        $model2 = new Detalle(); 
        $model3 = new Producto(); 
        $model_cliente = new Cliente(); 
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save() 
            && $model2->load($this->request->post())) {
                // $model->id_cliente = $model_cliente->_cliente;
                $model2->id_factura = $model-> num_factura;
                
                // var_dump($model2);
                // if($model->save()){
                     
                     $model2->save();
                // }
               /*  if($model->save() && $model2->save()  && $model3->save()){
                    if ($model->save()) {
                        $model->refresh();
                        $model2->id_factura = $model-> primaryKey;
                        $model2->id_producto = $model3-> id_producto;
                        $model2->save();
                     }
                } */
                //var_dump($model);
                // echo (2);
                return $this->redirect(['view', 'num_factura' => $model->num_factura]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
    }

    /**
     * Updates an existing Factura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $num_factura Num Factura
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($num_factura)
    {
        
        // $model2 = new Detalle(); 
        $model3 = new Producto(); 
        $model_cliente = new Cliente(); 
        //$model2->load($this->request->post()) 
        // && $model3->load($this->request->post()) && $model_cliente->load($this->request->post())
        $model = $this->findModel($num_factura);
        $model2 = $this->findModelDetalle($num_factura);

        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save() 
        && $model2->load($this->request->post())) {
            $model2->id_factura = $model-> num_factura;
            if($model->save()){
                $model2->save();
            }
            return $this->redirect(['view', 'num_factura' => $model->num_factura]);
        }

        return $this->render('update', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
    }

    /**
     * Deletes an existing Factura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $num_factura Num Factura
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($num_factura)
    {
        $this->findModel($num_factura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $num_factura Num Factura
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($num_factura)
    {
        if (($model = Factura::findOne(['num_factura' => $num_factura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $num_factura Num Factura
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelDetalle($num_factura)
    {
        if (($model = Detalle::findOne(['id_factura' => $num_factura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $num_factura Num Factura
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelView($num_factura)
    {
        
       /*  $consulta = Feeds::find()->leftJoin('seguidores', 'seguidores.seguidor_id=feeds.usuariosid')
        ->leftJoin('usuarios', ->andWhere('feeds.usuariosid=1') ->orWhere('seguidores.usuario_id=1')
        ->andWhere('feeds.created_at>seguidores.fecha_seguimiento') ->asArray()->all(); */
        /* 
        SELECT a.num_factura, d.nombre id_cliente, a.fecha 
        FROM factura a 
        left join detalle b on b.id_factura = a.num_factura 
        left join producto c on c.id_producto = b.id_producto 
        left join cliente d on d.id_cliente = a.id_cliente where a.num_factura = 1; 
        */
        $model = Factura::find()
        ->alias('a')
        ->select('a.num_factura, d.nombre id_cliente, a.fecha')
        ->leftJoin('detalle b', 'b.id_factura = a.num_factura')
        ->leftJoin('producto c', 'c.id_producto = b.id_producto')
        ->leftJoin('cliente d', 'd.id_cliente = a.id_cliente')
        // ->leftJoin('usuarios', ->andWhere('feeds.usuariosid=1') ->orWhere('seguidores.usuario_id=1')
        ->where([
            'a.num_factura' => $num_factura,
        ])
        ->one();
        
        // if (($model = Detalle::findOne(['id_factura' => $num_factura])) !== null) {
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
