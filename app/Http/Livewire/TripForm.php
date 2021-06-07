<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class TripForm extends Component
{

    public $loading_date, $truck_no, $loading_depot, $client, $product;
    public $tripID;

    protected $listeners = ['getTripID', 'forcedClosedModal'];

    public function getTripID($tripID)
    {
        $this->tripID = $tripID;    
        
        $model = Trip::find($this->tripID);

        $this->loading_date = $model->loading_date;
        $this->truck_no = $model->truck_no;
        $this->product = $model->product;
        $this->loading_depot = $model->loading_depot;
        $this->client = $model->client;
        
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
        $this->tripID = null;
        $this->loading_date = null;
        $this->truck_no = null;
        $this->loading_depot = null;
        $this->client = null;
        $this->product = null;
    }
  
    public function addTrip()
    {
        
        $this->validate([
            'loading_date' => 'required',
            'truck_no' => 'required',
            'product' => 'required',
            'loading_depot' => 'required',
            'client' => 'required',
        ]);

        $validatedData = [
            'loading_date' => $this->loading_date,
            'truck_no' => $this->truck_no,
            'product' => $this->product,
            'loading_depot' => $this->loading_depot,
            'client' => $this->client,
        ];
        
        if($this->tripID)
        {
            Trip::find($this->tripID)->update($validatedData);
            $this->emit('alert', ['type' => 'success', 'message' => 'Trip Updated Successfully']);
        } else {
            Trip::create($validatedData);
            $this->emit('alert', ['type' => 'success', 'message' => 'Trip Added Successfully']);
        }
    
        $this->emit('refreshParent');
        $this->emit('closeFormModal'); 
      //  $this->emit('closeFormModal', ['message' => 'Trip added successfully!']); 

       

        $this->resetInputFields();
        
        
    }

    public function render()
    {
        return view('livewire.trip-form');
    }
}
