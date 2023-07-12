<?php

use app\models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    function testExample() {
        $sum = 2 + 2;
        $this->assertEquals(4, $sum);
    }

    /**
     * Test if the produc was created
     */
    function testCreateProduct() {

        $product = new Product();
        
            $product['name'] = 'Product Test';
            $product['reference'] = 'PROD-001';
            $product['price'] = 2500;
            $product['weight'] = 0.5;
            $product['category'] = 'Product';
            $product['stock'] = 100;

        $product->save();

        // Verifica que el producto se haya creado correctamente en la base de datos
        $this->assertTrue(Product::find()->where(['reference' => 'REF001'])->exists());
    }
}
