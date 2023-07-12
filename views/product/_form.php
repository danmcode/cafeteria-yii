<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'errorCssClass' => 'is-invalid',
    ]) ?>

    <?= $form->field($model, 'name')->label('Nombre del producto:') ?>
    <?= $form->field($model, 'reference')->label('Referencia:') ?>
    <?= $form->field($model, 'price')->label('Precio:') ?>
    <?= $form->field($model, 'weight')->label('Peso:') ?>
    <?= $form->field($model, 'category')->label('Categoria:') ?>
    <?= $form->field($model, 'stock')->label('Stock:') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar Producto', [
            'class' => 'btn btn-primary',
        ]) ?>
    </div>
    
    <?php $form = ActiveForm::end() ?>

</div>