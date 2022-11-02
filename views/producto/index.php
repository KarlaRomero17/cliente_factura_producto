<?php

use app\models\Producto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title">Listado</h3> </div>

        <div class="card-body">
        <div class="producto-index">

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

                    'id_producto',
                    'nombre',
                    'precio',
                    'stock',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_producto' => $model->id_producto]);
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