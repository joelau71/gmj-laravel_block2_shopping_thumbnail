<div>
    @php
    $breadcrumbs = [
        ['name' => 'Element', 'link' => route("admin.element.index")],
        ['name' => $element->title],
        ['name' => "Product Creates"],
        ['name' => $mode]
    ];
    @endphp
    <x-admin.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <div class="relative mt-4">
        <x-admin.atoms.required />

        <x-admin.atoms.row>
            <x-admin.atoms.label for="category" class="required">
                Category
            </x-admin.atoms.label>

            <x-admin.atoms.select id="category" wire:model.lazy="collection.shopping_category_id" class="appearance-none rounded-lg border-gray-300">
                <option value="">--Please Select--</option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}"
                        @if ($collection["shopping_category_id"] == $item->id)
                            selected
                        @endif
                        >
                        {{ $item->title }}
                    </option>
                @endforeach
            </x-admin.atoms.select>
            @error("collection.shopping_category_id")
                <x-admin.atoms.error>
                    {{ $message }}
                </x-admin.atoms.error>
            @enderror
        </x-admin.atoms.row>

        <x-admin.atoms.row>
            <x-admin.atoms.label for="layout" class="required">
                Layout
            </x-admin.atoms.label>
            <x-admin.atoms.select id="layout" wire:model.lazy="collection.layout">
                <option value="">--Select Item--</option>
                @foreach (config("gmj.laravel_block2_shopping_thumbnail_config.layouts") as $item)
                    <option value="{{ $item }}"
                        @if ($collection["layout"] == $item)
                            selected
                        @endif
                    >
                        {{ $item }}
                    </option>
                @endforeach 
            </x-admin.atoms.select>
            @error("collection.layout")
                <x-admin.atoms.error>
                    {{ $message }}
                </x-admin.atoms.error>
            @enderror
        </x-admin.atoms.row>

        <hr class="my-10">

        <div class="text-right">
            <x-admin.atoms.link href="{{ route('admin.element.index') }}">
                Back
            </x-admin.atoms.link>
            <x-admin.atoms.button wire:click="save">
                Save
            </x-admin.atoms.button>
        </div>
    </div>
</div>