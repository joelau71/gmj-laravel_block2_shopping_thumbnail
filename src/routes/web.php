<?php

use GMJ\LaravelBlock2ShoppingThumbnail\Http\Livewire\Backend;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => ["web", "auth"],
    "prefix" => "admin/element/{element_id}/gmj/laravel_block2_shopping_thumbnail",
    "as" => "LaravelBlock2ShoppingThumbnail."
], function () {
    Route::get("index", Backend::class)->name("index");
});
