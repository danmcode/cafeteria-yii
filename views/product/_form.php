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
    <?= $form->field($model, 'price')->label('Precio:')
        ->textInput([
            'type' => 'number'
        ]) ?>
    <?= $form->field($model, 'weight')->label('Peso:')
        ->textInput([
            'type' => 'number'
        ]) ?>
    <?= $form->field($model, 'category')->label('Categoria:') ?>
    <?= $form->field($model, 'stock')->label('Stock:')
        ->textInput([
            'type' => 'number'
        ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar Producto', [
            'class' => 'btn btn-primary',
        ]) ?>
    </div>
    
    <?php $form = ActiveForm::end() ?>

</div>