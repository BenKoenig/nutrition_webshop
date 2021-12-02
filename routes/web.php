<?php

/**
 * ===============================================================
 * Controller Imports
 * ===============================================================
 */

use App\Controllers\AuthController;
use App\Controllers\Categories\CategoryController;
use App\Controllers\Categories\CategoryPanelController;
use App\Controllers\Products\ProductController;
use App\Controllers\Products\ProductPanelController;
use App\Controllers\Products\ProductDetailController;
use App\Controllers\Merchants\MerchantPanelController;
use App\Controllers\Users\UserPanelController;
use App\Controllers\Goals\GoalPanelController;
use App\Controllers\CartController;
use App\Controllers\Products\NewController;
use App\Controllers\Products\SaleController;
use App\Controllers\CheckoutController;
use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;

return [
    /**
     * Index/Home Route
     */
    '/' => [HomeController::class, 'index'],
    '/home' => [HomeController::class, 'index'],

    /**
     * Authority Routes
     */
    '/login' => [AuthController::class, 'loginForm'],
    '/login/do' => [AuthController::class, 'loginDo'],
    '/logout' => [AuthController::class, 'logout'],

    '/register' => [AuthController::class, 'registerForm'],
    '/register/do' => [AuthController::class, 'registerDo'],

    /**
     * Category Routes
     */
    '/categories' => [CategoryController::class, 'index'],
    '/categories/{id}' => [ProductController::class, 'index'],

    /**
     * Category Panel Routes
     */
    '/admin/categories' => [CategoryPanelController::class, 'index'],
    '/admin/categories/create' => [CategoryPanelController::class, 'create'],
    '/admin/categories/create/store' => [CategoryPanelController::class, 'store'],
    '/admin/categories/{id}/delete' => [CategoryPanelController::class, 'delete'],
    '/admin/categories/{id}/delete/confirm' => [CategoryPanelController::class, 'deleteConfirm'],
    '/admin/products' => [ProductPanelController::class, 'index'],
    '/admin/categories/{id}/edit' => [CategoryPanelController::class, 'edit'],
    '/admin/categories/{id}/edit/update' => [CategoryPanelController::class, 'update'],

    /**
     * Product Routes
     */
    '/product/{id}' => [ProductDetailController::class, 'index'],
    '/products/{id}/add-to-cart' => [CartController::class, 'add'],
    '/products/{id}/remove-from-cart' => [CartController::class, 'remove'],
    '/products/{id}/remove-all-from-cart' => [CartController::class, 'removeAll'],

    /**
     * Product Panel Routes
     */
    '/admin/products/create' => [ProductPanelController::class, 'create'],
    '/admin/products/create/store' => [ProductPanelController::class, 'store'],
    '/admin/products/{id}/edit' => [ProductPanelController::class, 'edit'],
    '/admin/products/{id}/edit/update' => [ProductPanelController::class, 'update'],
    '/admin/products/{id}/delete' => [ProductPanelController::class, 'delete'],
    '/admin/products/{id}/delete/confirm' => [ProductPanelController::class, 'deleteConfirm'],

    /**
     * Cart Route
     */
    '/cart' => [CartController::class, 'index'],

    /**
     * Checkout Routes
     */
    '/checkout/summary' => [CheckoutController::class, 'summary'],
    '/checkout/finish' => [CheckoutController::class, 'finish'],

    /**
     * Merchant Panel Routes
     */
    '/admin/merchants' => [MerchantPanelController::class, 'index'],
    '/admin/merchants/create' => [MerchantPanelController::class, 'create'],
    '/admin/merchants/create/store' => [MerchantPanelController::class, 'store'],
    '/admin/merchants/{id}/delete' => [MerchantPanelController::class, 'delete'],
    '/admin/merchants/{id}/delete/confirm' => [MerchantPanelController::class, 'deleteConfirm'],
    '/admin/merchants/{id}/edit' => [MerchantPanelController::class, 'edit'],
    '/admin/merchants/{id}/edit/update' => [MerchantPanelController::class, 'update'],

    /**
     * User Panel Routes
     */
    '/admin/users' => [UserPanelController::class, 'index'],

    /**
     * Goals Panel Routes
     */
    '/admin/goals' => [GoalPanelController::class, 'index'],
    '/admin/goals/create' => [GoalPanelController::class, 'create'],
    '/admin/goals/create/store' => [GoalPanelController::class, 'store'],
    '/admin/goals/{id}/delete' => [GoalPanelController::class, 'delete'],
    '/admin/goals/{id}/delete/confirm' => [GoalPanelController::class, 'deleteConfirm'],
    '/admin/goals/{id}/edit' => [GoalPanelController::class, 'edit'],
    '/admin/goals/{id}/edit/update' => [GoalPanelController::class, 'update'],

    /**
     * New Products Route
     */
    '/new' => [NewController::class, 'index'],

    /**
     * Sales Route
     */
    '/sales' => [SaleController::class, 'index'],

    /**
     * Admin Panel Route
     */
    '/admin' => [AdminController::class, 'index'],

    /**
     * Profile Route
     */
    '/profile' => [ProfileController::class, 'index'],
    '/profile/update' => [ProfileController::class, 'update'],
];