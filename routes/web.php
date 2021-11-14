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
use App\Controllers\RoomController;
use App\Controllers\RoomFeatureController;

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


    '/admin/categories' => [CategoryPanelController::class, 'index'],
    '/admin/categories/create' => [CategoryPanelController::class, 'create'],
    '/admin/categories/create/store' => [CategoryPanelController::class, 'store'],
    '/admin/categories/{id}/delete' => [CategoryPanelController::class, 'delete'],
    '/admin/categories/{id}/delete/confirm' => [CategoryPanelController::class, 'deleteConfirm'],
    '/admin/categories/{id}' => [ProductPanelController::class, 'index'],


    /**
     * Control Panel
     */

    '/admin' => [AdminController::class, 'index'],


];
