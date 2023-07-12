<?php
use yii\bootstrap5\Html;


/** @var yii\web\view $this */

$this->title = 'Actualizar Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-create">

    <div class="card">

        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold">
                <?= Html::encode($this->title) ?>
            </h6>
        </div>

        <div class="card-body">

            <?= $this->render('_formUpdate', [
                'model' => $product,
            ]) ?>

        </div>
    </div>

</div>