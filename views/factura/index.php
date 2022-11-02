<?php

use app\models\Factura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FacturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"> Listado</h3> </div>

        <div class="card-body">
            <div class="factura-index">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->

                <p>
                    <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'num_factura',
                        // 'id_cliente',
                        [
                            'attribute'=>'Cliente',
                            'value'=>'cliente.nombre' 
                        ],
                        [
                            'attribute'=>'Apellido',
                            'value'=>'cliente.apellido' 
                        ],
                       
                        'fecha',
                        [
                            'attribute'=>'Producto',
                            'value'=>'detalle.producto.nombre' 
                        ],
                        [
                            'attribute'=>'Precio',
                            'value'=>'detalle.precio'
                        ],
                        'fecha',
                        [
                            'attribute'=>'Cantidad',
                            'value'=>'detalle.cantidad'
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Factura $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'num_factura' => $model->num_factura]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
        <div class="card-footer">
            <!-- here button -->
        </div>
        </div>
    </div>

</div>
