<div class="flex justify-center">
    <div class="w-2/3 h-full ">
        <div>
            <p class="font-semibold text-pricy-base text-pricy-gray-400">Step 1/3 :</p>
        </div>
        <div class="flex flex-col px-12 pt-12 pb-4 mt-8 rounded-lg bg-pricy-gray-100" style="height: 500px">
            <h2 class="font-semibold text-gray-800 text-pricy-base">Whish producy would you like to test?</h2>
            <div class="relative mt-8">
                <input wire:model="searchTearm" type="text"
                    class="w-full px-8 py-3 text-sm placeholder-gray-500 rounded-lg outline-none text-pricy-gray-400"
                    placeholder="Search Product ({{ $products->total() }})">
                <div class="absolute left-2 top-3">
                    <svg width="20" height="20" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.17515 15.6835C9.52625 15.3324 9.52625 14.7631 9.17515 14.412C8.82404 14.0609 8.25478 14.0609 7.90367 14.412L4.3074 18.0083C3.95629 18.3594 3.95629 18.9287 4.3074 19.2798C4.65851 19.6309 5.22777 19.6309 5.57888 19.2798L9.17515 15.6835Z"
                            fill="#1B2124" />
                        <path
                            d="M12.1362 15.0478C9.65351 15.0478 7.64087 13.0352 7.64087 10.5525C7.64087 8.0698 9.65351 6.05717 12.1362 6.05717C14.6189 6.05717 16.6316 8.0698 16.6316 10.5525C16.6316 13.0352 14.6189 15.0478 12.1362 15.0478ZM12.1362 16.846C15.612 16.846 18.4297 14.0283 18.4297 10.5525C18.4297 7.07672 15.612 4.25903 12.1362 4.25903C8.66042 4.25903 5.84274 7.07672 5.84274 10.5525C5.84274 14.0283 8.66042 16.846 12.1362 16.846Z"
                            fill="#1B2124" />
                    </svg>

                </div>
            </div>
            <div class="flex-1 mt-4 overflow-scroll bg-white rounded">
                @foreach ($products as $product)
                    <div wire:click="$emitUp('incrementStep', {{ $product->shopify_product_id }})"
                        class="transition-colors duration-200 cursor-pointer hover:bg-gray-50">
                        <div class="flex items-center w-full px-6 py-2 space-x-2 ">
                            <div class="w-12 h-16">
                                <img src="{{ $product->image }}" class="w-full h-full" alt="{{ $product->title }}">
                            </div>
                            <div>
                                <p class="text-sm font-medium">{{ $product->title }} </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
                <div x-data="{
                            observe() {
                                let observer = new IntersectionObserver((entries) => {
                                    entries.forEach(entry => {
                                        if(entry.isIntersecting) {
                                            @this.call('loadMore')
                                        }
                                    })
                                }, {
                                    root: null
                                })

                                observer.observe(this.$el)
                            }
                        }" x-init="observe">

                </div>
            </div>
        </div>
    </div>

</div>
