<x-layouts.base>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">{{ __('Welcome') }}</div>
                    <div class="card-body">
                            <h1>Sibed Invoice Tracker</h1>
                            <p class="lead">Welcome to Sibed Invoice Tracker, making invoice tracking easier.</p>
                            <a class="btn btn-lg btn-primary" href="{{ route('login') }}" role="button">Please Login to continue</a>
                            <a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">No Account? Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.base>
