<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Visitor;
use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class Counters extends Component
{
    public $subscribers, $visitors, $weeklyGrowth, $graphData;

    public function mount()
    {
        $this->subscribers = Subscriber::count();
        $this->visitors = Visitor::where('date', today())->count();
        $this->weeklyGrowth = (Visitor::where('date', '>', today()->subWeek())->distinct('date')->count('date') / Visitor::distinct('date')->count('date')) * 100;
        $this->graphData = $this->getDailyVisitors();
    }

    public function getDailyVisitors()
    {
        $visitors = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();
        foreach ($visitors as $data)
        {
            array_push($chart_data, array($data->date->format('M d'), $data->total));
        }
        return $chart_data;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.counters');
    }
}
