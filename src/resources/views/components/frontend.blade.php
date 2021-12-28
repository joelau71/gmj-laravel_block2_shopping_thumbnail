<div class="laravel_block2_shopping_thumbnail" id="laravel_block2_shopping_thumbnail_{{$page_element_id}}">
    <x-frontend.row>
        <div class="flex flex-wrap -mx-4">
            @foreach ($collections as $item)
                <div class="w-full md:w-1/2 xl:w-1/4 mb-8 box">
                    <div class="px-4 h-full mx-auto">
                        <div class="relative flex flex-col h-full border border-gray-100 transform duration-500 hover:shadow-lg">
                            <div class="text-center overflow-hidden">
                                <img src="{{ $item->getFirstMedia("laravel_shopping_thumbnail")->getUrl() }}" alt="" class="w-full inline-block">
                            </div>
                            <div class="flex-1 flex flex-col p-4">
                                <h3 class="text-xl font-bold">
                                    {{ $item->getTranslation("title", $locale) }}
                                </h3>
                                <div class="flex-1">
                                    {!! $item->getTranslation("excerpt",  $locale) !!}
                                </div>
                                <div class="text-center mt-4">
                                    <a
                                        href="{{ route("LaravelShopping.cart.add_to_cart", $item->id) }}"
                                        class="inline-block main-btn-bg-color px-10 py-2 rounded-md text-white"
                                        >
                                        {{ __("buy") }}
                                    </a>
                                    <a
                                        href="{{ route("LaravelShopping.show", $item->id) }}"
                                        class="inline-block main-btn-bg-color px-10 py-2 rounded-md text-white"
                                        >
                                        {{ __("detail") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            @endforeach
        </div>
    </x-frontend.row>
</div>
