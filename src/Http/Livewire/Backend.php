<?php

namespace GMJ\LaravelBlock2ShoppingThumbnail\Http\Livewire;

use App\Models\Element;
use Livewire\Component;
use Alert;
use GMJ\LaravelBlock2ShoppingThumbnail\Models\Block;
use GMJ\LaravelShopping\Models\Category;

class Backend extends Component
{

    public $collection;
    public $element_id;
    public $element;
    public $mode;
    public $block_id;
    public $categories;

    public function mount($element_id)
    {
        $this->element_id = $element_id;
        $this->element = Element::findOrFail($this->element_id);
        $this->categories = Category::orderBy("display_order")->get();
        if ($this->element->is_active) {
            $this->mode = "edit";
            $data = Block::where("element_id", $this->element->id)->first();
            $this->block_id = $data->id;
            $this->collection = $data->toArray();
        } else {
            $this->mode = "create";
            $this->collection = [
                "element_id" => $this->element_id,
                "shopping_category_id" => null,
                "layout" => null,
            ];
        }
    }

    public function rules()
    {
        return [
            "collection.shopping_category_id" => ["required", "numeric"],
            "collection.layout" => ["required"],
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->mode == "create") {
            $this->store();
        } else {
            $this->update();
        }
    }

    public function store()
    {
        Block::create([
            "element_id" => $this->element->id,
            "shopping_category_id" => $this->collection["shopping_category_id"],
            "layout" => $this->collection["layout"],
        ]);

        $this->element->is_active = 1;
        $this->element->save();

        Alert::success("Add Product Thumbnail Success");
        return redirect()->route("admin.element.index");
    }

    public function update()
    {

        $collection = Block::findOrFail($this->block_id);
        $collection->shopping_category_id = $this->collection["shopping_category_id"];
        $collection->layout = $this->collection["layout"];
        $collection->save();

        Alert::success("Edit Product Thumbnail Success");
        return redirect()->route("admin.element.index");
    }

    public function render()
    {
        return view('LaravelBlock2ShoppingThumbnail::livewire.backend');
    }
}
