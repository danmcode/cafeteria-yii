<?php
use yii;
use yii\bootstrap5\Html;

/** @var yii\web\view $this */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="product-index">

    <div class="card">
        <div class="card-header py-2 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">
                <?= Html::encode($this->title) ?>
            </h6>

            <?= Html::a('Crear Producto',
                ['create'], 
                ['class' => 'btn btn-sm btn-success'])  ?>
        </div>

        <div class="card-body">
            <?php if(Yii::$app->session->hasFlash('message')): ?>                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>!Genial!</strong> <?= Yii::$app->session->getFlash('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if(Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>!Error!</strong> <?= Yii::$app->session->getFlash('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="table-responsive p-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($products) && sizeof($products) > 0):?>
                        <?php foreach($products as $key => $product): ?>
                        <tr>
                            <th scope="row"> <?= $key + 1 ?> </th>
                            <td> <?= $product['name'] ?> </td>
                            <td> <?= $product['reference'] ?> </td>
                            <td> <?= $product['price'] ?> </td>
                            <td> <?= $product['weight'] ?> </td>
                            <td> <?= $product['category'] ?> </td>
                            <td> <?= $product['stock'] ?> </td>
                            <td> <?= '' ?> </td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <?= Html::a('<i class="bi bi-pencil"></i>', 
                                            ['edit', 'id' => $product['id']], 
                                            ['class' => 'btn btn-sm btn-primary']) ?>
                                    </div>
                                    <div class="col-4">
                                        <?= Html::a('<i class="bi bi-send"></i>', 
                                            ['sell', 'id' => $product['id']], 
                                            ['class' => 'btn btn-sm btn-secondary']) ?>
                                    </div>
                                    <div class="col-4">
                                        <?= Html::a('<i class="bi bi-trash"></i>',
                                         ['delete', 'id' => $product['id']],
                                         ['class' => 'btn btn-sm btn-danger',
                                            'data-confirm' => Yii::t('yii', '¿Estas seguro que deseas eliminar el producto ' . $product['name'] . '?' )
                                        ]) ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>