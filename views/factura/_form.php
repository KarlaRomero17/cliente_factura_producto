<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use app\models\Producto;

/** @var yii\web\View $this */
/** @var app\models\Factura $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"> Nuevo </h3> </div>

        <div class="card-body">
            <div class="factura-form">

                <?php $form = ActiveForm::begin(); ?>
               
                <?= $form->field($model, 'id_cliente')->dropDownList(
                    ArrayHelper::map(Cliente::find()->all(), 'id_cliente',
                    function($model) {
                        return $model['nombre'].' '.$model['apellido'];
                    }),
                    ['prompt'=>'seleccione']
                )->label("ID Cliente") ?>

                <?= $form->field($model, 'fecha')->Input('date') ?>

                <!-- Producto - campos -->
                <?= $form->field($model2, 'id_producto')->dropDownList(
                    ArrayHelper::map(Producto::find()->all(), 'id_producto','nombre'),
                    ['prompt'=>'seleccione']
                )->label("Producto") ?>

                <!-- Detalle - campos  -->
                <?= $form->field($model2, 'cantidad')->textInput() ?>
                <?= $form->field($model2, 'precio')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <div class="card-footer">
            <!-- here button -->
        </div>
        </div>
    </div>

</div>
