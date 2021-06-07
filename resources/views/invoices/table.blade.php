@if($invoices->isNotEmpty())
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Loading Date</th>
      <th scope="col">Truck No</th>
      <th scope="col">Product</th>
      <th scope="col">Loading Depot</th>
      <th scope="col">Client</th>
      <th scope="col">Offloading Date</th>
      <th scope="col">Offloading Point</th>
      <th scope="col">Delivery Note Number</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    @foreach ( $invoices as $invoice )
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      @foreach ($invoice->trips as $trip)
      <td> {{ $trip->loading_date }} </td>
      <td> {{ $trip->truck_no }} </td>
      <td> {{ $trip->product }} </td>
      <td> {{ $trip->loading_depot }} </td>
      <td> {{ $trip->client }} </td>
      @endforeach
      <td>{{ $invoice->offloading_date }}</td>
      <td>{{ $invoice->offloading_point }}</td>
      <td>{{ $invoice->delivery_note_no }}</td>
      {{-- <td>
          @foreach ($invoice->trips as $trip)
          <input type="text" wire:model="tripID" value="{{ $trip->client }}">
      @endforeach
      </td> --}}
      <td>
        <button wire:click="selectItem({{ $invoice->id }}, 'update')" type="button" class="btn btn-md btn-success">
          Update
        </button>
        <button wire:click="selectItem({{ $invoice->id }}, 'delete')" type="button" class="btn btn-md btn-danger">
          Delete
        </button>
      </td>
    </tr>
    @endforeach
    @else
    <div class="row justify-content-center mt-2">
      <p>No matching records found</p>
    </div>
    @endif
  </tbody>
</table>