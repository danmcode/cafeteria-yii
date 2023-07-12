<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;


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
                Yii::$app->getSession()->setFlash('error', 'No se pudo crear el producto');
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
                Yii::$app->getSession()->setFlash('error', 'No se pudo actualizar el producto');
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
            Yii::$app->getSession()->setFlash('error', 'No se pudo eliminar el Producto');
            return $this->redirect(['index']);

        }
    }

    function actionSell($id){
        $product = Product::findOne($id);

        return $this->render('sell', [
            'product' => $product,
        ]);
    }

}