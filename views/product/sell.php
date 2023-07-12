<?php
use yii\bootstrap5\Html;


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
        
            <?= var_dump($product['name']) ?>

        </div>
    </div>

</div>