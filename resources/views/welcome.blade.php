@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">welcome to this online store</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Come one, come all?
                    <!--Routes to /about which is the name of the web.php-->
                    Read More <a href="{{route('about')}}">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
