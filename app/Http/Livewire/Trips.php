<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Trips extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $action;
    public $selectedItem;
    
    
    protected $listeners = ['refreshParent' => '$refresh'];

    public function selectItem($tripID, $action)
    {
        $this->selectedItem = $tripID;
        if ($action == 'delete') 
        { 
            $this->emit('openDeleteModal');
        } else {
            $this->emit('getTripID', $this->selectedItem);
            $this->emit('openFormModal');
        }
    }


    public function delete()
    {
        Trip::destroy($this->selectedItem);
        $this->emit('closeDeleteModal');
        $this->emit('alert', ['type' => 'success', 'message' => 'Trip Deleted Successfully']);

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public function render()
    {
        $trips = Trip::where('truck_no', 'LIKE', "%{$this->search}%")
            ->orWhere('loading_date', 'LIKE', "%{$this->search}%")
            ->orWhere('product', 'LIKE', "%{$this->search}%")
            ->orWhere('loading_depot', 'LIKE', "%{$this->search}%")
            ->orWhere('client', 'LIKE', "%{$this->search}%")
            ->paginate(5);

        return view('livewire.trips', ['trips' => $trips]);
    }
}
