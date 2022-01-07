@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Games
            <a href="{{ route('admin.games.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($games)=== 0)
              <p>Hope this means you are soled out</p>
            @else
            <table id="table-festivals" class="table table-hover">
                <thead>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Release Date</th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($games as $game)
                    <tr data-id="{{ $game->id }}">
                      <td>{{ $game->title }}</td>
                      <td>{{ $game->info }}</td>
                      <td>{{ $game->price }}</td>
                      <td>{{ $game->release_date }}</td>  
                      <td>
                        <a href="{{ route('admin.games.show', $game->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.games.destroy', $game->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                          <button type="submit" class="form-cotrol btn btn-danger">Delete</a>
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
