<x-layouts.app>
        @if (session('status'))
            <div class="alert alert-success py-2">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/import" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="file" type="file" class="form-control-file mb-3" name="file">
                        <button type="submit" class="btn btn-primary ">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.app>