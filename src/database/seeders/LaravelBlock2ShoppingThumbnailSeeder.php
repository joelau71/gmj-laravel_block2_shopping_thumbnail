<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\ElementTemplate;
use GMJ\LaravelBlock2ShoppingThumbnail\Models\Block;
use GMJ\LaravelShopping\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class LaravelBlock2ShoppingThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = ElementTemplate::where("component", "LaravelBlock2ShoppingThumbnail")->first();

        if ($template) {
            return false;
        }

        $template = ElementTemplate::create(
            [
                "title" => "Laravel Livewire2 Product Thumbnail",
                "component" => "LaravelBlock2ShoppingThumbnail",
            ]
        );

        $element = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-block2-shopping-thumbnail-sample",
            "is_active" => 1
        ]);


        $categories = Category::all()->pluck("id")->toArray();

        Block::create([
            "element_id" => $element->id,
            "shopping_category_id" => Arr::random($categories),
            "layout" => "column-4",
        ]);
    }
}
