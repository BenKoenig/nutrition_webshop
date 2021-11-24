<?php

/**
 * use-Statements erlauben es uns Klassen mit ihrem Namespace einmal oben zu definieren. Dadurch ersparen wir uns unten
 * immer den gesamten Namespace anzugeben.
 */

use App\Controllers\AuthController;
use App\Controllers\Categories\CategoryController;
use App\Controllers\Categories\CategoryPanelController;
use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\Products\ProductPanelController;
use App\Controllers\Merchants\MerchantPanelController;
use App\Controllers\Flavors\FlavorPanelController;
use App\Controllers\Ratings\RatingPanelController;
use App\Controllers\CartController;
use App\Controllers\RoomController;
use App\Controllers\Products\ProductController;
use App\Controllers\RoomFeatureController;
use App\Controllers\Products\NewController;
use App\Controllers\Products\SaleController;
use App\Controllers\Users\UserPanelController;
use App\Controllers\Goals\GoalPanelController;

/**
 * Die Dateien im /routes Ordner beinhalten ein Mapping von einer URL auf eine eindeutige Controller & Action
 * kombination. Als Konvention definieren wir, dass URL-Parameter mit {xyz} definiert werden müssen, damit das Routing
 * korrekt funktioniert.
 *
 * + /blog/{slug} --> BlogController->show($slug)
 * + /shop/{id} --> ProductController->show($id)
 */



return [
    /**
     * Index Route
     */
    '/' => [HomeController::class, 'index'], // HomeController::class => "App\Controllers\HomeController"

    /**
     * Auth Routes
     */
    '/login' => [AuthController::class, 'loginForm'],
    '/login/do' => [AuthController::class, 'loginDo'],
    '/logout' => [AuthController::class, 'logout'],

    /**
     * Home Route
     */
    '/home' => [HomeController::class, 'home'],
    '/home' => [HomeController::class, 'display'],



    /**
     * Rooms Routes
     */
    '/rooms' => [RoomController::class, 'index'],
    '/rooms/{id}' => [RoomController::class, 'edit'],
    '/rooms/{id}/update' => [RoomController::class, 'update'],
    '/rooms/{id}/delete' => [RoomController::class, 'delete'],
    '/rooms/{id}/delete/confirm' => [RoomController::class, 'deleteConfirm'],
    '/rooms/create' => [RoomController::class, 'create'],
    '/rooms/store' => [RoomController::class, 'store'],

    /**
     * RoomFeatures Routes
     */
    '/room-features' => [RoomFeatureController::class, 'index'],
    '/room-features/{id}' => [RoomFeatureController::class, 'edit'],
    '/room-features/{id}/update' => [RoomFeatureController::class, 'update'],
    '/room-features/{id}/delete' => [RoomFeatureController::class, 'delete'],
    '/room-features/{id}/delete/confirm' => [RoomFeatureController::class, 'deleteConfirm'],
    '/room-features/create' => [RoomFeatureController::class, 'create'],
    '/room-features/store' => [RoomFeatureController::class, 'store'],

    // ...

    '/categories' => [CategoryController::class, 'index'],
    '/categories/{id}' => [ProductController::class, 'index'],
    '/product/{id}' => [ProductController::class, 'detail'],
    
    '/admin/categories' => [CategoryPanelController::class, 'index'],
    '/admin/categories/create' => [CategoryPanelController::class, 'create'],
    '/admin/categories/create/store' => [CategoryPanelController::class, 'store'],
    '/admin/categories/{id}/delete' => [CategoryPanelController::class, 'delete'],
    '/admin/categories/{id}/delete/confirm' => [CategoryPanelController::class, 'deleteConfirm'],
    '/admin/categories/{id}' => [ProductPanelController::class, 'index'],
    '/admin/categories/{id}/edit' => [CategoryPanelController::class, 'edit'],
    '/admin/categories/{id}/edit/update' => [CategoryPanelController::class, 'update'],
    '/admin/products/{id}/ratings' => [RatingPanelController::class, 'index'],
    '/admin/ratings/{id}/delete' => [RatingPanelController::class, 'delete'],
    '/admin/ratings/{id}/delete/confirm' => [RatingPanelController::class, 'deleteConfirm'],

    '/admin/products/create' => [ProductPanelController::class, 'create'],
    '/admin/products/create/store' => [ProductPanelController::class, 'store'],

    
    '/cart' => [CartController::class, 'index'],

    '/admin/merchants' => [MerchantPanelController::class, 'index'],
    '/admin/merchants/create' => [MerchantPanelController::class, 'create'],
    '/admin/merchants/create/store' => [MerchantPanelController::class, 'store'],
    '/admin/merchants/{id}/delete' => [MerchantPanelController::class, 'delete'],
    '/admin/merchants/{id}/delete/confirm' => [MerchantPanelController::class, 'deleteConfirm'],
    '/admin/merchants/{id}/edit' => [MerchantPanelController::class, 'edit'],
    '/admin/merchants/{id}/edit/update' => [MerchantPanelController::class, 'update'],

    '/admin/flavors' => [FlavorPanelController::class, 'index'],
    '/admin/flavors/create' => [FlavorPanelController::class, 'create'],
    '/admin/flavors/create/store' => [FlavorPanelController::class, 'store'],
    '/admin/flavors/{id}/delete' => [FlavorPanelController::class, 'delete'],
    '/admin/flavors/{id}/delete/confirm' => [FlavorPanelController::class, 'deleteConfirm'],
    '/admin/flavors/{id}/edit' => [FlavorPanelController::class, 'edit'],
    '/admin/flavors/{id}/edit/update' => [FlavorPanelController::class, 'update'],

    '/admin/users' => [UserPanelController::class, 'index'],

    '/admin/goals' => [GoalPanelController::class, 'index'],
    '/admin/goals/{id}/edit' => [GoalPanelController::class, 'edit'],
    '/admin/goals/{id}/edit/update' => [GoalPanelController::class, 'update'],
    

    '/new' => [NewController::class, 'index'],
    
    '/sales' => [SaleController::class, 'index'],

    /**
     * Control Panel
     */

    '/admin' => [AdminController::class, 'index'],



];
