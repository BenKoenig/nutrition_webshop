<?php

namespace App\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Core\Helpers\Redirector;
use Core\View;
use Core\Session;


class CartController
{
    public function index()
    {
        //lodas products in cart
        $productsInCart = CartService::get();

        //renders view
        View::render('cart', [
            'products' => $productsInCart
        ]);
    }

    public function add(int $id)
    {
        //loads product with the id given in parameter
        $product = Product::findOrFail($id);

        
        //adds item in cart if it is in stock and if not, it will give an error
        if($product->getUnits() < 1) {
            Session::set('errors', [$product->name . ' is out of stock']);
            Redirector::redirect('/cart');
        }

        CartService::add($product);

        /**
         * Redirect.
         */
        Redirector::redirect('/cart');
    }


    
    public function remove(int $id)
    {
        //loads product with the id given in the parameter
        $product = Product::findOrFail($id);

        //removes item from cart
        CartService::remove($product);

        //redirects user back to cart
        Redirector::redirect('/cart');
    }

    public function removeAll(int $id)
    {
        //loads product with the id given in the parameter
        $product = Product::findOrFail($id);

        //removes all items from cart
        CartService::removeAll($product);

        //redirects user back to cart
        Redirector::redirect('/cart');
    }

}
