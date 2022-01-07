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
                     <!--Keeps the id from the pulled from the show function and the title in the attribute title-->
                    <td>{{ $game->title }}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                     <!--Keeps the id from the pulled from the show function and the title in the attribute info-->
                    <td>{{ $game->info }}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                     <!--Keeps the id from the pulled from the show function and the title in the attribute rprice-->
                    <td>{{ $game->price }}</td>
                  </tr>
                  <tr>
                    <td>Release Date</td>
                     <!--Keeps the id from the pulled from the show function and the title in the attribute release date-->
                    <td>{{ $game->release_date }}</td>
                  </tr>
                  <tr>
                    <td>Questions?</td>
                     <!--Keeps the id from the pulled from the show function and the title in the attribute email and phone-->
                    <td>{{ $game->contact_email }}</td>
                    <td>{{ $game->contact_phone }}</td>
                  </tr>
                </tbody>
              </table>
                    <!--Routes to admin.games.index which is the name of the web.php-->
              <a href="{{ route('admin.games.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection