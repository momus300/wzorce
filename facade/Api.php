<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:39 AM
 */

namespace Facade;

class User
{
    public function login()
    {
        echo "Logowanie do systemu\n";
    }

    public function register()
    {
        echo "Rejestracja\n";
    }
}

class Cart
{
    public function getItems()
    {
        echo "Zawartość koszyka\n";
    }
}

class Product
{
    public function getAll()
    {
        echo "Lista produktów\n";
    }

    public function get($id)
    {
        echo "Produkt o ID " . $id . "\n";
    }
}

class API
{
    private $user;
    private $cart;
    private $product;

    public function __construct()
    {
        $this->user = new User();
        $this->cart = new Cart();
        $this->product = new Product();
    }

    public function login()
    {
        $this->user->login();
    }

    public function register()
    {
        $this->user->register();
    }

    public function getBuyProducts()
    {
        $this->cart->getItems();
    }

    public function getProducts()
    {
        $this->product->getAll();
    }

    public function getProduct($id)
    {
        $this->product->get($id);
    }
}

// testy
$client = new API();
$client->register();
$client->login();
$client->getProducts();
$client->getProduct(5);
$client->getBuyProducts();