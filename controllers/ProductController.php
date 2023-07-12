<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\SoldProduct;

class ProductController extends Controller
{

    public function actionIndex(){

        $products = Product::find()->all();


        return $this->render('index', [
            'products' => $products,
        ]);
    }

    function actionCreate() {
        
        $model = new Product();

        if( $model->load($this->request->post()) && $model->validate()){

            if( $model->save() ){
                Yii::$app->getSession()->setFlash('message', 'Producto creado correctamente');
                return $this->redirect(['index']);
            }else{
                Yii::$app->getSession()->setFlash('productError', 'No se pudo crear el producto');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    function actionEdit($id){

        $product = Product::findOne($id);

        if ($product->load($this->request->post()) && $product->validate()) {
            if( $product->save() ){
                Yii::$app->getSession()->setFlash('message', 'Producto actualizado correctamente');
                return $this->redirect(['index']);
            }else{
                Yii::$app->getSession()->setFlash('productError', 'No se pudo actualizar el producto');
                return $this->redirect(['index']);
            }
        }

        return $this->render('edit', [
            'product' => $product,
        ]);
    }

    function actionUpdate() {
        return 'update';
    }

    function actionDelete($id){
        $product = Product::findOne($id);

        if($product->delete()){
            Yii::$app->getSession()->setFlash('message', 'Producto eliminado correctamente');
            return $this->redirect(['index']);
        }else{
            Yii::$app->getSession()->setFlash('productError', 'No se pudo eliminar el Producto');
            return $this->redirect(['index']);

        }
    }

    function actionSell($id){
        $product = Product::findOne($id);
        $soldProduct = new SoldProduct();

        if ($soldProduct->load($this->request->post()) && $soldProduct->validate()) {

            if($product['stock'] > 0 && $product['stock'] >= $soldProduct['amount']){
                
                $product['stock'] = $product['stock'] - $soldProduct['amount'];
                
                if($product->save()){

                    $soldProduct->save();

                    Yii::$app
                        ->getSession()
                        ->setFlash('message', 'Se ha vendido : ' . $soldProduct['amount'] . ' items del producto '. $product['name'] . " Restante: " . $product['stock']);
                    return $this->redirect(['index']);
                }else{
                    Yii::$app->getSession()->setFlash('productError', 'No se pudo registrar la venta');
                    return $this->redirect(['index']);
                }
                
            }else{
                Yii::$app->getSession()->setFlash('productError', 'La cantidad minima para vender es: ' . $product['stock']);
            }

        }
        
        return $this->render('sell', [
            'product' => $product,
            'soldProduct' => $soldProduct,
        ]);
    }

}