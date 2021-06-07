<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use App\Models\Invoice;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class InvoiceForm extends Component
{

    public $offloading_date, $offloading_point, $delivery_note_no;
    public $tripID;

    protected $listeners = ['getTripID', 'forcedClosedModal'];

    public function getTripID($tripID)
    {
        $this->tripID = $tripID;    
        
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
        
        $invoice = Invoice::create($validatedData);
        $status_update = Trip::where('id', '=' ,$this->tripID)->first();
        $status_update->status = 'received';
        $status_update->save();
        $invoice->trips()->attach($this->tripID);
        

       




    
        $this->emit('refreshParent');
        $this->emit('closeFormModal'); 
        $this->emit('alert', ['type' => 'success', 'message' => 'Invoice Created Successfully']);
      //  $this->emit('closeFormModal', ['message' => 'Trip added successfully!']); 

       

        $this->resetInputFields();
        
        
    }

    public function render()
    {
        return view('livewire.invoice-form');
    }
}
