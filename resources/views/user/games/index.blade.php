@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Festivals
          </div>
          <div class="card-body">
            <!--If the table games is empty do this-->
            @if (count($games)=== 0)
              <p>No Games for you!</p>
            @else
            <!--If table games has content-->
              <table id="table-games" class="table table-hover">
                <thead>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Release Date</th>
                  <th></th>
                </thead>
                <tbody>
                  <!--Looks in the array games and for each object in games call it game -->
                  @foreach ($games as $game)
                  <!--Get the game id-->
                    <tr data-id="{{ $game->id }}">
                      <!--From the game with the same id get the title -->
                      <td>{{ $game->title }}</td>
                      <!--From the game with the same id get the info-->
                      <td>{{ $game->info }}</td>
                      <!--From the game with the same id get the price -->
                      <td>{{ $game->price }}</td>
                      <!--From the game with the same id get the release date -->
                      <td>{{ $game->release_date }}</td>
                      <td>
                        <!--Routes to view page for the user within the games folder. Keeping the id -->
                        <a href="{{ route('user.games.show', $game->id) }}" class="btn btn-primary">View</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection