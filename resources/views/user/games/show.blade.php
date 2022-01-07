@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Game: {{ $game->title }}
          </div>
          <div class="card-body">
              <table id="table-festivals" class="table table-hover">
                <tbody>
                  <tr>
                    <td>Title</td>
                    <td>{{ $game->title }}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>{{ $game->info }}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td>{{ $game->price }}</td>
                  </tr>
                  <tr>
                    <td>Release Date</td>
                    <td>{{ $game->release_date }}</td>
                  </tr>
                  <tr>
                    <td>Questions?</td>
                    <td>{{ $game->contact_email }}</td>
                    <td>{{ $game->contact_phone }}</td>
                  </tr>
                </tbody>
              </table>

              <a href="{{ route('user.games.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection