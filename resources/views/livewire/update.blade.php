      <!-- Editing Modal -->
<form>
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                    <span>Edit Trip</span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Loading Date</label>
                <div class="col-sm-5">
                  <input  wire:model.defer="state.loading_date" id="loading_date" type="date" class="@error('loading_date') is-invalid @enderror form-control form-control-sm">
                </div>
                @error('loading_date')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Truck No</label>
                <div class="col-sm-5">
                  <input  wire:model.defer="state.truck_no" id="truck_no" type="text" class="@error('truck_no') is-invalid @enderror form-control form-control-sm">
                </div>
                @error('truck_no')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Product</label>
                <div class="col-sm-5">
                  <input  wire:model.defer="state.product" id="product" type="text" class="@error('product') is-invalid @enderror form-control form-control-sm">
                </div>
                @error('product')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Loading Depot</label>
                <div class="col-sm-5">
                  <input  wire:model.defer="state.loading_depot" id="loading_depot" type="text" class="@error('loading_depot') is-invalid @enderror form-control form-control-sm">
                </div>
                @error('loading_depot')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Client</label>
                <div class="col-sm-5">
                  <input  wire:model.defer="state.client" id="client" type="text" class="@error('client') is-invalid @enderror form-control form-control-sm">
                </div>
                @error('client')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
              </div>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click.prevent="update()" type="button" class="btn btn-primary">
                    <span>Save Changes</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    </form>
</div>
