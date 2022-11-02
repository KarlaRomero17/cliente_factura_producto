<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cliente $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
        <div class="card-header"> <h3 class="card-title"></h3> </div>

        <div class="card-body">
            <div class="cliente-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fecha_nacimiento')->Input('date') ?>

                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::class, [
                    'mask' => '9999-9999',]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <!-- <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'categoria')->dropDownList([
                        '1' => 'Cat1',
                        '2' => 'Cat2',
                    ], [ 'prompt'=>'Seleccione', 'onchange' => 'run()']) ?>

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