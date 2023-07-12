<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;



/** @var yii\web\view $this */

$this->title = 'Vender Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-create">

    <div class="card">

        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold">
                <?= Html::encode($this->title . ': ' . $product['name'] ) ?>
                <?= Html::encode(' - Stock' . ': ' . $product['stock'] ) ?>
            </h6>
        </div>

        <div class="card-body">
            <?php if(Yii::$app->session->hasFlash('productError')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>!Error!</strong> <?= Yii::$app->session->getFlash('productError') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif ?>

            <?php $form = ActiveForm::begin([
                'errorCssClass' => 'is-invalid',
            ]) ?>

            <?= $form->field($soldProduct, 'product_id')
                ->textInput([
                    'value' => $product['id'],
                    'readonly' => true,
                    'type' => 'number'
                    ])?>

            <?= $form->field($soldProduct, 'amount')
                ->label('Cantidad a vender:')
                ->textInput([
                    'type' => 'number',
                ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Vender', [
                    'class' => 'btn btn-primary',
                 ]) ?>
            </div>

            <?php $form = ActiveForm::end() ?>

        </div>
    </div>

</div>