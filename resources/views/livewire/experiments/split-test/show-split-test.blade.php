<div class="container flex flex-col mx-auto mt-8">
    <hr class="my-4">
    @foreach ($splitCycles as $splitCycle)
        @livewire('experiments.split-test.show-split-test-column', ['splitCycle' =>
        $splitCycle, 'splitTestId' => $splitTestId ], key($splitCycle->id))
        <hr class="my-4">
    @endforeach
</div>
