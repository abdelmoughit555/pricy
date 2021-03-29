<div class="flex flex-col px-6 py-8 transition-all duration-200 rounded-3xl hover:bg-pricy-gray-100"
    x-data="{ show : false }" @mouseenter="show = true" @mouseleave="show = false">
    <div>
        <div class="w-full h-56 lg:px:6 xl:px-12">
            <img src="{{ asset('images/experiments/' . $expirement['image']) }}" class="h-full" />
        </div>
        <div class="mt-4">
            <p class="font-semibold text-pricy-medium">{{ $expirement['name'] }}</p>
        </div>
        <div class="mt-2">
            <p class="leading-loose text-pricy-gray-300 text-pricy-sm">compare different prices of your
                products
                to
                determine
                which performs
                better, with the goal of
                boosting conversions.</p>
        </div>
        <div class="mt-6">
            <template x-if="show">
                <a href="{{ route($expirement['route_name']) }}"
                    class="px-5 py-3 text-xs font-medium text-gray-100 bg-gray-900 rounded">Start
                    expirementing</a>
            </template>
        </div>

    </div>
</div>
