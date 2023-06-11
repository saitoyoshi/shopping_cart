<?php

require_once __DIR__ . '/lib/Product.php';
require_once __DIR__ . '/lib/Cart.php';
require_once __DIR__ . '/lib/User.php';

class Main {
    const ADD = 1;
    const REMOVE = 2;
    public function run(): void {
        $cart = new Cart();
        $user = new User($cart);
        $product1 = new Product('Apple iPhone 13', 99000);
        $product2 = new Product('Sony WH-1000XM4', 25000);
        $product3 = new Product('Nintendo Switch', 30000);
        $product4 = new Product('Dell XPS 13', 150000);
        $product5 = new Product('Bose QuietComfort 35 II', 35000);
        $product6 = new Product('ゼブラ　ボールペン５個セット', 335);

        $userName = $user->getName();

        $cart->addProduct($product1);
        $this->displayMessage($userName, $product1->getName(), self::ADD, $cart);

        $cart->addProduct($product1);
        $this->displayMessage($userName, $product1->getName(), self::ADD, $cart);

        $cart->addProduct($product2);
        $this->displayMessage($userName, $product2->getName(), self::ADD, $cart);

        $cart->addProduct($product2);
        $this->displayMessage($userName, $product2->getName(), self::ADD, $cart);

        $cart->addProduct($product3);
        $this->displayMessage($userName, $product3->getName(), self::ADD, $cart);

        $cart->addProduct($product4);
        $this->displayMessage($userName, $product4->getName(), self::ADD, $cart);

        $cart->addProduct($product5);
        $this->displayMessage($userName, $product5->getName(), self::ADD, $cart);

        $cart->addProduct($product6);
        $this->displayMessage($userName, $product6->getName(), self::ADD, $cart);

        $cart->addProduct($product6);
        $this->displayMessage($userName, $product6->getName(), self::ADD, $cart);

        $cart->addProduct($product6);
        $this->displayMessage($userName, $product6->getName(), self::ADD, $cart);


        $cart->removeProduct($product1->getName());
        $this->displayMessage($userName, $product1->getName(), self::REMOVE, $cart);

        $cart->removeProduct($product1->getName());
        $this->displayMessage($userName, $product1->getName(), self::REMOVE, $cart);

        $cart->removeProduct($product2->getName());
        $this->displayMessage($userName, $product2->getName(), self::REMOVE, $cart);

        $cart->removeProduct($product2->getName());
        $this->displayMessage($userName, $product2->getName(), self::REMOVE, $cart);

        $cart->removeProduct($product4->getName());
        $this->displayMessage($userName, $product4->getName(), self::REMOVE, $cart);

        $cart->removeProduct($product6->getName());
        $this->displayMessage($userName, $product6->getName(), self::REMOVE, $cart);

        $total = $cart->total();
        $user->checkout();
        $this->confirmMessage($user->getEmail(), $total);
    }
    private function displayMessage(string $userName, string $productName, int $action, $cart): void {
        switch ($action) {
            case self::ADD:
                echo '[' . $userName . ']さんは【' . $productName . '】をカートに入れました' . PHP_EOL;
                break;
            case self::REMOVE:
                echo '[' . $userName . ']さんは【' . $productName . '】をカートから削除しました' . PHP_EOL;
                break;
            default:
               throw new Exception('不正な操作です');
        }
        echo '現在の合計金額： ' . $cart->total() . '円' . PHP_EOL;
    }
    private function confirmMessage(string $email, int $price): void {
        echo '合計:' . $price . '円になります' . PHP_EOL;
        echo '[' . $email . ']に注文内容を送信しました' . PHP_EOL;
    }
}

$main = new Main();
$main->run();
