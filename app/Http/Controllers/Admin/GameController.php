<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets everything from games table and stores it in games
        $games = Game::all();
        //Redirect the user to the admin.games.index then pass in this spesific game
        //it is the green games that i am using in admin.games.blade
        return view('admin.games.index', ['games' => $games ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirects the user to admin.games.create
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //the validate function is allready created
        //laravel knows what request is
        $request->validate([
            'title'=> 'required',
            //It is required and must have no more than 500 characters
            'info' => 'required|max:500',
            'price' => 'required',
            //It is required and must have the date structure
            'release_date' => 'required|date',
            //It is required and must have the email structure
            'contact_email' => 'required|email',
            //It is required and must have 8 characters
            'contact_phone' => 'required|digits:8',
        ]);

        //Simiar to the structure for seeding 
        //game is now an empty object
        $game = new Game();
        //In Create form i had many inputs and i want the one for title and putting it in game title 
        $game->title = $request->input('title');
        $game->info = $request->input('info');
        $game->price = $request->input('price');
        $game->release_date = $request->input('release_date');
        $game->contact_email = $request->input('contact_email');
        $game->contact_phone = $request->input('contact_phone');
        //now game is a complete object
        $game->save();

        return redirect()->route('admin.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //Fin the games with the spesific id and put it into the variable $game
        //If it can find the id it will send an arror
        $game = Game::findOrFail($id);
        //Redirect the user to the user.games.show then pass in this spesific game
        return view('admin.games.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Fin the games with the spesific id and put it into the variable $game
        //If it can find the id it will send an arror
        $game = Game::findOrFail($id);
        //Redirect the user to the user.games.edit then pass in this spesific game
        return view('admin.games.edit', [ 'game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Fin the games with the spesific id and put it into the variable $game
        //If it can find the id it will send an arror
        //Similar to the store function
        $game = Game::findOrFail($id);
        $request->validate([
            'title'=> 'required',
            //It is required and must have no more than 500 characters
            'info' => 'required|max:500',
            'price' => 'required',
            //It is required and must have the date structure
            'release_date' => 'required|date',
            //It is required and must have the email structure
            'contact_email' => 'required|email',
            //It is required and must have 8 characters
            'contact_phone' => 'required|digits:8',
        ]);

        //Simiar to the structure for seeding 
        $game->title = $request->input('title');
        $game->info = $request->input('info');
        $game->price = $request->input('price');
        $game->release_date = $request->input('release_date');
        $game->contact_email = $request->input('contact_email');
        $game->contact_phone = $request->input('contact_phone');
        //does not save a new one, but updates
        $game->save();

        return redirect()->route('admin.games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Fin the games with the spesific id and put it into the variable $game
        //If it can find the id it will send an arror
        $game = Game::findOrFail($id);
        //With the game object call the function delete
        $game->delete();
        //Redirect the user to the admin.games.destroy then pass in this spesific game
        return redirect()->route('admin.games.index');
    }
}
