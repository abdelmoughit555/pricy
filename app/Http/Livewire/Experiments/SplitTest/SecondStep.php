<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Jobs\SplitTest\StartSplitTest;
use App\Models\Product;
use App\Models\SplitCycle;
use App\Models\SplitTest;
use Livewire\Component;

class SecondStep extends Component
{
    public $isFetching = false;
    public $product = [];
    public $variants = [];
    public $tests = [];

    protected $listeners = ['fetchProductId'];

    public function mount()
    {
        $this->isFetching = true;

        $this->product = auth()->user()->getProduct();

        $this->variants = $this->product["variants"];

        $this->addNewTest();

        $this->isFetching = false;
    }


    public function fetchProductId($productId)
    {
        $this->isFetching = true;

        $this->product = auth()->user()->getProduct($productId);

        dd($this->product);

        $this->variants = $this->product["variants"];

        $this->addNewTest();

        $this->isFetching = false;
    }

    public function incrementPrice($testKey, $productKey)
    {
        $this->tests[$testKey]['variants'][$productKey]['new_price']++;
    }

    public function addNewTest()
    {
        array_push($this->tests, [
            'start_at' => '',
            'variants' => $this->variantsProduct()
        ]);
    }

    protected function variantsProduct()
    {
        $variants = [];
        foreach ($this->variants as $variant) {
            array_push($variants, [
                'start_at' => '2020-12-12',
                'end_at' =>  '2020-12-12',
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
            ->where('shopify_product_id', '6549307195599')
            ->first();


        $splitTest = $product->splitTests()->create([
            'shop_id' => $product->shop_id,
            'title' => $product->title
        ]);

        foreach ($this->tests as $test) {
            foreach ($test['variants'] as $variant) {
                $splitTest->splitCycles()->create([
                    'start_at' => '2021-03-20', // test["date"],
                    'end_at' => '2021-03-21', // test["date"],
                    'variant_id' => $variant['variant_id'],
                    'new_price' => $variant['new_price'],
                    'old_price' => $variant['old_price'],
                    'status' => SplitCycle::PENDING
                ]);

                /*                 $splitTest->splitCycles()->create([
                    'start_at' => '2020-12-02', // test["date"],
                    'end_at' => '2020-12-02', // test["date"],
                    'variant_id' => $variant['variant_id'],
                    'new_price' => $variant['price'],
                    'old_price' => $variant['price'],
                    'status' => SplitCycle::PENDING
                ]); */
            }
        }

        /*
        $splitTest = $splitTest->fresh();
        foreach ($splitTest->splitCycles as $splitCycle) {
            StartSplitTest::dispatch(auth()->user(), $splitCycle);
        } */
    }

    public function render()
    {
        return view('livewire.experiments.split-test.second-step');
    }
}
