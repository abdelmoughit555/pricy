<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Models\SplitCycle;
use Carbon\Carbon;
use Livewire\Component;

class SecondStep extends Component
{
    public $product = [];
    public $variants = [];
    public $tests = [];
    public $errorMessage = '';
    public $currentLoop  = 1;
    public $isLoading = true;
    public $currentStartAt = "";
    public $currentEndAt = "";

    protected $listeners = ['fetchProductId', 'finshSplitTest'];

    public function mount()
    {
        $this->product = auth()->user()->getProduct(6553892389071);

        $this->variants = $this->product["variants"];

        array_push($this->tests, [
            'start_at' => '',
            'end_at' => '',
            'variants' => $this->variantsProduct(),
            'has_error' => false
        ]);

        $this->isLoading = false;
    }
    /*     public function fetchProductId($productId)
    {
        $this->product = auth()->user()->getProduct($productId);

        $this->variants = $this->product["variants"];

        $this->addNewTest();

        $this->isLoading = false;
    } */

    public function incrementPrice($testKey, $productKey)
    {
        $this->tests[$testKey]['variants'][$productKey]['new_price']++;
    }

    public function addNewTest()
    {
        $this->errorMessage = "";
        if (!$this->checkDateValidation()) return;
        $this->checkDateValidation();
        array_push($this->tests, [
            'start_at' => '',
            'end_at' => '',
            'variants' => $this->variantsProduct(),
            'has_error' => false
        ]);

        $this->totalTest = count($this->tests);
    }

    protected function checkdateValidation()
    {
        $this->validate([
            'tests.*.start_at' => 'required',
            'tests.*.end_at' => 'required',
            'tests.*.variants.*.old_price' => 'required',
            'tests.*.variants.*.new_price' => 'required',
            'tests.*.variants.*.variant_id' => 'required',
        ]);

        $status = true;
        foreach ($this->tests as $key => $test) {
            $startAt = Carbon::parse($test['start_at']);
            $endAt = Carbon::parse($test['end_at']);

            if (is_null($startAt) || is_null($endAt)) {
                $this->errorMessage = 'please fix';
                break;
            }

            $passCycle = $startAt > $endAt;
            if ($key == 0) {
                if ($passCycle) {
                    $this->tests[$key]['has_error'] = true;
                    $this->errorMessage = 'please fix';
                    $status = false;
                } else {
                    $this->tests[$key]['has_error'] = false;
                }
            } else {
                $previousStartAt = Carbon::parse($this->tests[$key - 1]['start_at']);
                $previousEndAt = Carbon::parse($this->tests[$key - 1]['end_at']);

                $passStartAt = $startAt > $previousStartAt && $startAt > $previousEndAt;

                $passEndAt = $endAt > $previousStartAt  && $endAt > $previousEndAt;

                if (!($passStartAt && $passEndAt) || $passCycle) {
                    $this->tests[$key]['has_error'] = true;
                    $this->errorMessage = 'please fix';
                    $status = false;
                } else {
                    $this->tests[$key]['has_error'] = false;
                }

                $this->currentStartAt = $startAt->format('yyyy-mm-dd');
                $this->currentEndAt = $endAt->format('yyyy-mm--dd');
            }
        }
        return $status;
    }

    protected function variantsProduct()
    {
        $variants = [];
        foreach ($this->variants as $variant) {
            array_push($variants, [
                'old_price' => $variant['price'],
                'new_price' => $variant['price'],
                'variant_id' => $variant['id']
            ]);
        }

        return $variants;
    }

    public function finshSplitTest()
    {
        $product = auth()->user()->products()
            ->where('shopify_product_id', $this->product['id'])
            ->first();

        $splitTest = $product->splitTests()->create([
            'shop_id' => $product->shop_id,
            'title' => $product->title,
            'deadline' => $this->tests[array_key_last($this->tests)]['end_at']
        ]);

        foreach ($this->tests as $test) {
            foreach ($test['variants'] as $variant) {
                $splitTest->splitCycles()->create([
                    'start_at' => Carbon::parse($test['start_at'])->format('Y-m-d'),
                    'end_at' => Carbon::parse($test['end_at'])->format('Y-m-d'),
                    'variant_id' => $variant['variant_id'],
                    'new_price' => $variant['new_price'],
                    'old_price' => $variant['old_price'],
                    'status' => SplitCycle::PENDING
                ]);
            }
        }

        redirect('/');
    }

    public function render()
    {
        return view('livewire.experiments.split-test.second-step');
    }
}
