<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Models\SplitCycle;
use Livewire\Component;

class SecondStep extends Component
{
    public $product = [];
    public $variants = [];
    public $tests = [];
    public $isLoading = true;

    protected $listeners = ['fetchProductId', 'finshSplitTest'];

    public function fetchProductId($productId)
    {
        $this->product = auth()->user()->getProduct($productId);

        $this->variants = $this->product["variants"];

        $this->addNewTest();

        $this->isLoading = false;
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
            ->where('shopify_product_id', $this->product['id'])
            ->first();

        $splitTest = $product->splitTests()->create([
            'shop_id' => $product->shop_id,
            'title' => $product->title
        ]);

        foreach ($this->tests as $test) {
            foreach ($test['variants'] as $variant) {
                $splitTest->splitCycles()->create([
                    'start_at' => '2021-03-20', // test["start_at"],
                    'end_at' => '2021-03-21', // test["end_at"],
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
