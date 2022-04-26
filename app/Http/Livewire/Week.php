<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class Week extends Component
{
    /**
     * The current date.
     *
     * @var Carbon
     */
    public $currentDate;

    /**
     * The last and after 3 days from now
     *
     * @var Carbon[]
     */
    public $days;

    public function mount()
    {
        $this->currentDate = Carbon::now();
        $this->days = $this->getDates();
    }

    public function render()
    {
        return view('livewire.week');
    }

    public function changeDay($day)
    {
        $this->currentDate = $day;

        $this->validate([
            'currentDate' => ['date']
        ]);

        $this->currentDate = Carbon::parse($day);

        $this->days = $this->getDates();

        $this->emit('Week.DayChanged', $day);
    }

    public function nextDay()
    {
        $this->changeDay($this->currentDate->addDay()->toDateString());
    }

    public function previousDay()
    {
        $this->changeDay($this->currentDate->subDay()->toDateString());
    }

    protected function getDates()
    {
        return [
            $this->currentDate->copy()->subDays(3),
            $this->currentDate->copy()->subDays(2),
            $this->currentDate->copy()->subDays(1),
            $this->currentDate->copy(),
            $this->currentDate->copy()->addDays(1),
            $this->currentDate->copy()->addDays(2),
            $this->currentDate->copy()->addDays(3),
        ];
    }
}
