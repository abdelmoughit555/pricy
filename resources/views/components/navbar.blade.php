<div class="w-full border-b shadow-sm">
    <div class="flex justify-between px-24 py-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div class="w-5">
                <img src="{{ asset('images/logo.png') }}" />
            </div>
            <p class="text-lg font-semibold capitalize text-pricy-gray-400">pricey</p>
        </a>
        <div class="flex items-center space-x-3" x-data="{ open : false }" @click.away="open = false">
            <div>
                <p class="font-medium capitalize">{{ auth()->user()->shop_owner }}</p>
            </div>
            <div class="relative ">
                <p @click="open = !open"
                    class="flex items-center justify-center w-12 h-12 text-lg font-semibold text-white uppercase bg-indigo-700 rounded-full cursor-pointer">
                    {{ auth()->user()->avatar() }}</p>
                <template x-if="open">
                    <div
                        class="absolute right-0 z-10 flex flex-col w-56 mx-auto mt-2 overflow-hidden bg-white border border-gray-300 shadow-lg rounded-xl">
                        <div>
                            <h2
                                class="flex justify-between w-full px-3 py-2 text-sm text-gray-700 transition-all duration-100 ">
                                {{ auth()->user()->name }}</h2>
                        </div>
                        <div>
                            <h2
                                class="flex justify-between w-full px-3 py-2 text-sm font-bold text-gray-700 transition-all duration-100 cursor-pointer">
                                Billing</h2>
                        </div>
                        <div class="mb-2">
                            <h2
                                class="flex justify-between w-full px-3 py-2 text-sm font-bold text-gray-700 transition-all duration-100 cursor-pointer">
                                Support</h2>
                        </div>
                        <div class="border-t">
                            <form action="/logout" method="GET">
                                @csrf
                                <button
                                    class="flex items-center w-full px-3 py-2 space-x-2 text-sm text-gray-700 transition-all duration-100 cursor-pointer">
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.5238 11.6667V13.3333C10.5238 13.7754 10.3532 14.1993 10.0496 14.5118C9.74597 14.8244 9.33416 15 8.90476 15H1.61905C1.18965 15 0.777838 14.8244 0.474208 14.5118C0.170578 14.1993 0 13.7754 0 13.3333V1.66667C0 1.22464 0.170578 0.800716 0.474208 0.488155C0.777838 0.175595 1.18965 0 1.61905 0H8.90476C9.33416 0 9.74597 0.175595 10.0496 0.488155C10.3532 0.800716 10.5238 1.22464 10.5238 1.66667V3.33333H8.90476V1.66667H1.61905V13.3333H8.90476V11.6667H10.5238ZM12.5476 2.91667L11.403 4.095L13.9011 6.66667H5.66667V8.33333H13.9011L11.403 10.905L12.5476 12.0833L17 7.5L12.5476 2.91667Z"
                                            fill="black" />
                                    </svg>

                                    <span class="font-bold">Sign out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
