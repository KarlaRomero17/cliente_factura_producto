<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cliente $model */

$this->title = $model->id_cliente;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"></h3> </div>

        <div class="card-body">
            <div class="cliente-view">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->

                <p>
                    <?= Html::a('Update', ['update', 'id_cliente' => $model->id_cliente], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id_cliente' => $model->id_cliente], [
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
                        'id_cliente',
                        'nombre',
                        'apellido',
                        'direccion',
                        'fecha_nacimiento',
                        'telefono',
                        'email:email',
                        'categoria',
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
