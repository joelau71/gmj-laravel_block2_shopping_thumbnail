<?php

namespace GMJ\LaravelBlock2ShoppingThumbnail\View\Components;

use GMJ\LaravelBlock2ShoppingThumbnail\Models\Block;
use GMJ\LaravelShopping\Models\Category;
use Illuminate\View\Component;

class Frontend extends Component
{
    public $element_id;
    public $page_element_id;
    public $collections;

    public function __construct($pageElementId, $elementId)
    {

        $this->page_element_id = $pageElementId;
        $this->element_id = $elementId;
        $block = Block::findOrFail($this->element_id);
        $category = Category::findOrFail($block->shopping_category_id);
        $this->collections = $category->products;
    }

    public function render()
    {
        return view("LaravelBlock2ShoppingThumbnail::components.frontend");
    }
}
