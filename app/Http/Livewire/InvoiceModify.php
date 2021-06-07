<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;


class InvoiceModify extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $action;
    public $selectedItem;
    public $tripID;
    
    
    protected $listeners = ['refreshParent' => '$refresh'];

    public function selectItem($invoiceID, $action)
    {
        $this->selectedItem = $invoiceID;
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
        Invoice::destroy($this->selectedItem);
        // $status_update = Trip::where('id', '=' ,$this->tripID)->first();
        // $status_update->status = 'pending';
        // $status_update->save();
        $this->emit('closeDeleteModal');
        $this->emit('alert', ['type' => 'success', 'message' => 'Invoice Deleted Successfully']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public function render()
    {

        // $invoices = Invoice::whereHas('trips', function($query) {
        //     $query->whereNotNull('id');
        // })->paginate(5);

        $invoices = Invoice::with('trips') 
            ->where('offloading_date', 'LIKE', "%{$this->search}%")
            ->orWhere('offloading_point', 'LIKE', "%{$this->search}%")
            ->orWhere('delivery_note_no', 'LIKE', "%{$this->search}%")
            ->orWhereHas('trips', function($query){
                $query->where('truck_no', 'LIKE', "%{$this->search}%")
                ->orWhere('product', 'LIKE', "%{$this->search}%")
                ->orWhere('loading_depot', 'LIKE', "%{$this->search}%")
                ->orWhere('client', 'LIKE', "%{$this->search}%");
            })
            ->paginate(5);

        return view('livewire.invoice-modify', ['invoices' => $invoices]);
    }


}
