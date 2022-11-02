<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Factura $model */

$this->title = $model->num_factura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"></h3> </div>

        <div class="card-body">
            <div class="factura-view">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->

                <p>
                    <?= Html::a('Actualizar', ['update', 'num_factura' => $model->num_factura], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'num_factura' => $model->num_factura], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'num_factura',
                        // 'id_cliente',
                        [
                            'label'=>'Cliente',
                            'value'=>$model->cliente->nombre, 
                        ],
                        [
                            'label'=>'Apellido',
                            'value'=>$model->cliente->apellido, 
                        ],
                        [
                            'label'=>'Producto',
                            'value'=>$model->detalle->producto->nombre, 
                        ],
                        [
                            'label'=>'Precio',
                            'value'=>$model->detalle->precio, 
                        ],
                        [
                            'label'=>'Cantidad',
                            'value'=>$model->detalle->cantidad, 
                        ],
                        'fecha',
                    ],
                ]) ?>

            </div>
        </div>
        <div class="card-footer">
            <!-- here button -->
        </div>
        </div>
    </div>

</div>