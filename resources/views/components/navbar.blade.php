<div class="w-full border-b shadow-sm">
    <div class="flex justify-between px-24 py-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div class="w-5">
                <img src="{{ asset('images/logo.png') }}" />
            </div>
            <p class="text-lg font-semibold capitalize text-pricy-gray-400">pricey</p>
        </a>
        <div class="flex items-center space-x-4" x-data="{ open : false }" @click.away="open = false">
            <div>
                <p class="font-medium">{{ auth()->user()->name }}</p>
            </div>
            <div class="relative">
                <img src="{{ auth()->user()->avatar() }}" @click="open = !open"
                    class="w-12 h-12 border-4 rounded-full cursor-pointer border-pricy-gray-200" alt="">
                <template x-if="open">
                    <div
                        class="absolute right-0 z-10 w-56 mx-auto mt-2 overflow-hidden bg-white border rounded shadow-lg">
                        <form action="/logout" method="GET">
                            @csrf
                            <button
                                class="flex justify-between w-full px-3 py-2 text-sm text-gray-700 transition-all duration-100 cursor-pointer hover:bg-purple-200">
                                <span>Logout</span>
                            </button>
                        </form>

                    </div>
                </template>

            </div>
        </div>
    </div>
</div>
