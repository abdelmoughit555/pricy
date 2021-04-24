<div class="flex w-full h-full">
    <div class="container flex flex-col items-center mx-auto xl:w-2/3">
        <div class="flex flex-col items-center">
            <h1 class="font-semibold text-center text-pricy-gray-400 text-pricy-large">Create an expirement</h1>
            <p class="mt-3 text-center text-pricy-gray-300 text-pricy-base">In which strategy would you like to create
                your
                expirement
                today?</p>
        </div>
        <div class="flex justify-center mt-24 w-96">
            @foreach ($expirements as $expirement)
                <x-expirements.type :expirement="$expirement" />
            @endforeach
        </div>
    </div>

</div>
