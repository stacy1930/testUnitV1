<?php

namespace App\tests;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider getProductClothe
     */
    public function testProductClothe($product, $expected)
    {
        // on appelle CLOTHE_PRODUCT depuis la class avec Product::
        // $product = new Product('robe', Product::CLOTHE_PRODUCT, 10);
        $result = $product->computeTva();

        // assertSame verifie si c'est le meme type et la meme value
        // Sans dataprovider
        // $this->assertSame(0.4, $result); failed car 0.4 pas identique à 0.55
        // $this->assertSame(0.55, $result);

        // Avec le getProductClothe() //DATAPROVIDER
        $this->assertSame($expected, $result);
    }

    public function testTvaWithNegativePrice()
    {
        $product = new Product('produit negatif', 'test', -1);

        $this->expectException('LogicException');

        $product->computeTva();
    }

    public function getProductClothe()
    {
        return [
            // [new Product('produit', Product::CLOTHE_PRODUCT, 10), 0.55],
            'test avec produit clothe' => [new Product('produit', Product::CLOTHE_PRODUCT, 10), 0.55],
            // [new Product('produit', 'test', 10), 1.96];
            'test sans produit clothe' => [new Product('produit', 'test', 10), 1.96]

        ];
    }
}
