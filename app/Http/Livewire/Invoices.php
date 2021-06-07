<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Invoices extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $selectedItem;

    public function selectItem($tripID)
    {
        $this->selectedItem = $tripID;
        $this->emit('getTripID', $this->selectedItem);
        $this->emit('openFormModal');

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public function render()
    {
        $trips = Trip::withCount('invoices')->where('truck_no', 'LIKE', "%{$this->search}%")
            ->orWhere('loading_date', 'LIKE', "%{$this->search}%")
            ->orWhere('product', 'LIKE', "%{$this->search}%")
            ->orWhere('loading_depot', 'LIKE', "%{$this->search}%")
            ->orWhere('client', 'LIKE', "%{$this->search}%")
            ->paginate(5);

        return view('livewire.invoices', ['trips' => $trips]);
    }
}
