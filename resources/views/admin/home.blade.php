@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Admin
                    <!--Routes to admin.games.index which is the name of the web.php-->
                    <a href="{{ route('admin.games.index') }}" class="btn btn-default">Show</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
