<?php

namespace App\Services;

use App\Models\Product;



class CartService
{


    const SESSION_KEY = 'product-cart';


    public static function add(Product $product): array
    {
        //initializes cart
        self::init();

        //checks if item is already in cart
        if (self::has($product)) {
            //adds another item to the cart
            $_SESSION[self::SESSION_KEY][$product->id]++;
        } else {
            //sets item to 1
            $_SESSION[self::SESSION_KEY][$product->id] = 1;
        }

        return self::get();
    }


    public static function remove(Product $product): array
    {
        //initializes cart
        self::init();


        //checks if item is already in cart
        if (self::has($product)) {
            //reduces item by 1
            $_SESSION[self::SESSION_KEY][$product->id]--;


            //removes item from cart completely
            if ($_SESSION[self::SESSION_KEY][$product->id] <= 0) {
                self::removeAll($product);
            }
        }

        return self::get();
    }

    public static function removeAll(Product $product): array
    {
        //initializes cart
        self::init();

        //checks if item is already in cart
        if (self::has($product)) {

            //removes item from cart completely
            unset($_SESSION[self::SESSION_KEY][$product->id]);
        }

        return self::get();
    }

    public static function get(): array
    {
        //initializes cart
        self::init();

        $products = [];

        //goes through all items in cart
        foreach ($_SESSION[self::SESSION_KEY] as $productId => $number) {
            $product = Product::findOrFail($productId);

            $product->count = $number;

            //saves items in array
            $products[] = $product;
        }

        return $products;
    }


    public static function getCount(): int
    {
        //initializes cart
        self::init();

        $count = 0;

        //goes through all items in cart
        foreach ($_SESSION[self::SESSION_KEY] as $productId => $number) {
            $count = $count + $number;
        }

        return $count;
    }


    private static function init()
    {

        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
    }


    private static function has(Product $product): bool
    {
        return isset($_SESSION[self::SESSION_KEY][$product->id]);
    }


    //deletes cart from session
    public static function destroy()
    {
        if (isset($_SESSION[self::SESSION_KEY])) {
            unset($_SESSION[self::SESSION_KEY]);
        }
    }
}
