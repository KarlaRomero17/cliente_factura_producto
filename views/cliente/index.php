<?php

use app\models\Cliente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
// use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"></h3> </div>

        <div class="card-body">
            <div class="cliente-index">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->

                <p>
                    <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id_cliente',
                        'nombre',
                        'apellido',
                        'direccion',
                        // 'fecha_nacimiento',
                        'telefono',
                        //'email:email',
                        //'categoria',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Cliente $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_cliente' => $model->id_cliente]);
                            }
                        ],
                    ],
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel'  => 'Last'
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
