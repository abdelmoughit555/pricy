<div class="flex items-center justify-center w-full h-full">
    <div class="container flex flex-col items-center w-2/3 mx-auto">
        <div class="flex flex-col items-center">
            <h1 class="font-semibold text-center text-pricy-gray-400 text-pricy-large">Create an expirement</h1>
            <p class="mt-3 text-center text-pricy-gray-300 text-pricy-base">In which strategy would you like to create
                your
                expirement
                today?</p>
        </div>
        <div class="grid grid-cols-3 mt-24 gap-x-16">
            <div class="flex flex-col px-6 py-8 transition-all duration-200 rounded-3xl hover:bg-pricy-gray-100">
                <form action="/create-experiment/split-test">
                    @csrf
                    <div>
                        <img src="{{ asset('images/experiments/split-test.png') }}" class="h-full" />
                    </div>
                    <div class="mt-4">
                        <p class="font-semibold text-pricy-medium">Split test</p>
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
                        <a href="{{ url('create-experiment/split-test') }}"
                            class="px-5 py-3 text-xs font-medium text-gray-100 bg-gray-900 rounded">Choose a
                            strategy</a>
                    </div>
                </form>

            </div>
            <div class="flex flex-col px-6 py-8 transition-all duration-200 rounded-3xl hover:bg-pricy-gray-100">
                <div>
                    <img src="{{ asset('images/experiments/rules.png') }}" class="h-full" />
                </div>
                <div class="mt-4">
                    <p class="font-semibold text-pricy-medium">Rules</p>
                </div>
                <div class="mt-2">
                    <p class="leading-loose text-pricy-gray-300 text-pricy-sm">Rules help guide actions toward desired
                        results.</p>
                </div>
                <div class="mt-6">

                </div>
            </div>
            <div class="flex flex-col px-6 py-8 transition-all duration-200 rounded-3xl hover:bg-pricy-gray-100">
                <div>
                    <img src="{{ asset('images/experiments/ai.png') }}" class="h-full" />
                </div>
                <div class="mt-4">
                    <p class="font-semibold text-pricy-medium">A.I</p>
                </div>
                <div class="mt-2">
                    <p class="leading-loose text-pricy-gray-300 text-pricy-sm">With our Artificial intelligence you can
                        create, optimize, and manage your prices.</p>
                </div>
                <div class="mt-6">

                </div>
            </div>
        </div>
    </div>

</div>
