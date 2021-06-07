<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceModifyForm extends Component
{

    public $offloading_date, $offloading_point, $delivery_note_no;
    public $invoiceID;

    protected $listeners = ['getTripID', 'forcedClosedModal'];

    public function getTripID($invoiceID)
    {
        $this->invoiceID = $invoiceID;    
        
        $model = Invoice::find($this->invoiceID);

        $this->offloading_date = $model->offloading_date;
        $this->offloading_point = $model->offloading_point;
        $this->delivery_note_no = $model->delivery_note_no;
        
    }

    public function forcedClosedModal()
    {
        //reset public variables
        $this->resetInputFields();

        //reset validation errors
        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function resetInputFields(){
        $this->offloading_date = null;
        $this->offloading_point = null;
        $this->delivery_note_no = null;
    }
  
    public function addTrip()
    {
        
        $this->validate([
            'offloading_date' => 'required',
            'offloading_point' => 'required',
            'delivery_note_no' => 'required',
        ]);

        $validatedData = [
            'offloading_date' => $this->offloading_date,
            'offloading_point' => $this->offloading_point,
            'delivery_note_no' => $this->delivery_note_no,
        ];

        
        Invoice::find($this->invoiceID)->update($validatedData);

        
        

    
        $this->emit('refreshParent');
        $this->emit('closeFormModal'); 
        $this->emit('alert', ['type' => 'success', 'message' => 'Invoice Updated Successfully']);
      //  $this->emit('closeFormModal', ['message' => 'Trip added successfully!']); 

       

        $this->resetInputFields();
        
        
    }
    
    public function render()
    {
        return view('livewire.invoice-modify-form');
    }
}
