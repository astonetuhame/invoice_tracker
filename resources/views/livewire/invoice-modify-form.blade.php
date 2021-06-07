<div>
    <form>         
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Offloading Date</label>
            <div class="col-sm-5">
                <input wire:model.defer="offloading_date" id="offloading_date" type="date"
                    class="@error('offloading_date') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('offloading_date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('offloading_date') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Offloading Point</label>
            <div class="col-sm-5">
                <input name="truck_no" wire:model.defer="offloading_point" id="offloading_point" type="text"
                    class="@error('offloading_point') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('offloading_point'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('offloading_point') }}
                    </span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label">Delivery Note Number</label>
            <div class="col-sm-5">
                <input wire:model.defer="delivery_note_no" id="delivery_note_no" type="text"
                    class="@error('delivery_note_no') is-invalid @enderror form-control form-control-sm">
                    @if ($errors->has('delivery_note_no'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('delivery_note_no') }}
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