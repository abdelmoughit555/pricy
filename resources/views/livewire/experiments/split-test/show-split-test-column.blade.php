<div class="space-y-4">
    <div>
        <p>Start at: <span>{{ $splitCycle->start_at }}</span></p>
    </div>
    <div>
        <p>End at: <span>{{ $splitCycle->end_at }}</span></p>
    </div>
    <div>
        <p>Status: <span>{{ $splitCycle->status }}</span></p>
    </div>
    <div>
        <p>variants:</p>
        <div class="mt-4 space-y-4">
            @foreach ($splitCycle->variants as $key => $variant)
                <div>
                    <p>Variant name : <span>{{ $variant->variant_name }}</span></p>
                </div>
                <div>
                    <p>Variant new price : <span>{{ $variant->new_price }}</span></p>
                </div>
                <div>
                    <p>Variant new price : <span>{{ $variant->old_price }}</span></p>
                </div>
                @if (count($splitCycle->variants) > 1)
                    <hr class="my-4">
                @endif
            @endforeach
        </div>

    </div>
    @if (!$splitCycle->is_winner)
        <button wire:click="setWinner( {{ $splitCycle->id }} )"
            class="h-10 px-4 text-xs text-white bg-blue-600 rounded">Set
            winner</button>
    @else
        this split test is the winner
    @endif
</div>
