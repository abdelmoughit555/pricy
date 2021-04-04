<?php

namespace App\Http\Livewire\Dashboard;

use App\Charts\OrderChart;
use Livewire\Component;

class Chart extends Component
{

    public function render()
    {
        $orders = auth()->user()->orders()->orderBy('orders.created_at')->createdLast(7)->selectRaw("DATE_FORMAT(orders.created_at, '%Y %m %e') as day, sum(total_price) as revenue")->groupBy('day')->pluck('revenue', 'day');

        return view('livewire.dashboard.chart', [
            'label' => $orders->keys(),
            'data' => $orders->values()
        ]);
    }
}
