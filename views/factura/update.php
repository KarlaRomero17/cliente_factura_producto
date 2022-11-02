<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Factura $model */

$this->title = 'Actualizar Factura: ' . $model->num_factura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num_factura, 'url' => ['view', 'num_factura' => $model->num_factura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factura-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'model3' => $model3,
    ]) ?>

</div>
