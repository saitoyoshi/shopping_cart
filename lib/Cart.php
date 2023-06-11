<?php

require_once __DIR__ . '/../lib/Product.php';

class Cart {
    const TAX = 0.10;
    private array $productList = [];

    public function getProductList(): array {
        return $this->productList;
    }
    public function addProduct(Product $product):void {
        $this->productList[] = $product;
    }
    public function removeProduct(string $name): void {
        $productFound = false;
        foreach($this->productList as $index => $product) {
            if ($product->getName() === $name) {
                unset($this->productList[$index]);
                $productFound = true;
                break;
            }
        }
        if (!$productFound) {
            // 簡単に済ませる
            echo 'すでにその商品はカートに一つも入っていません' . PHP_EOL;
            // exit;
            // throw new Exception("Product with name {$name} not found.");
        }
        // keyを再インデックス
        $this->productList = array_values($this->productList);
    }
    public function isEmpty(): bool {
        return count($this->productList) === 0;
    }
    public function clear(): void {
        $this->productList = [];
    }
    public function total():int {
        $total = 0;
        foreach ($this->productList as $product) {
            $total += $product->getPrice();
        }
        return floor($total * (1 + self::TAX));
    }
}
