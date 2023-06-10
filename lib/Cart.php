<?php

require_once __DIR__ . '/../lib/Product.php';

class Cart {
    private array $productList = [];

    public function getProductList(): array {
        return $this->productList;
    }
    public function addProduct(Product $product):void {
        $this->productList[] = $product;
    }
    public function deleteProduct(string $name): void {
        foreach($this->productList as $index => $product) {
            if ($product->getName() === $name) {
                unset($this->productList[$index]);
                break;
            }
        }
        // keyを再インデックス
        $this->productList = array_values($this->productList);
    }
}
