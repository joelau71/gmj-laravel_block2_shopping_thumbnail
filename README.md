# gmj-laravel_block2_shopping_thumbnail

Laravel Block for backend and frontend - need tailwindcss support

**_*dependence: gmj/laravel_shopping*_**<br/>
**composer require gmj/laravel_block2_shopping_thumbnail**

in terminal run:<br/>
php artisan vendor:<br>
publish --provider="GMJ\LaravelBlock2ShoppingThumbnail\LaravelBlock2ShoppingThumbnailServiceProvider" --force

php artisan migrate

php artisan db:seed --class=LaravelBlock2ShoppingThumbnailSeeder

package for test<br>
composer.json#autoload-dev#psr-4: "GMJ\\LaravelBlock2ShoppingThumbnail\\": "package/laravel_block2_shopping_thumbnail/src/",<br>
config: GMJ\LaravelBlock2ShoppingThumbnail\LaravelBlock2ShoppingThumbnailServiceProvider::class,
