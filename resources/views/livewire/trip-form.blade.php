<div>
    <form>         
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Loading Date</label>
            <div class="col-sm-5">
                <input wire:model.defer="loading_date" id="loading_date" type="date"
                    class="@error('loading_date') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('loading_date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('loading_date') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Truck No</label>
            <div class="col-sm-5">
                <input name="truck_no" wire:model.defer="truck_no" id="truck_no" type="text"
                    class="@error('truck_no') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('truck_no'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('truck_no') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Product</label>
            <div class="col-sm-5">
                <input wire:model.defer="product" id="product" type="text"
                    class="@error('product') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('product'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('product') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Loading Depot</label>
            <div class="col-sm-5">
                <input wire:model.defer="loading_depot" id="loading_depot" type="text"
                    class="@error('loading_depot') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('loading_depot'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('loading_depot') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Client</label>
            <div class="col-sm-5">
                <input wire:model.defer="client" id="client" type="text"
                    class="@error('client') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('client'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('client') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click.prevent="addTrip()" type="button" class="btn btn-primary">
              <span>Save</span>
            </button>
          </div>
    </form>
</div>