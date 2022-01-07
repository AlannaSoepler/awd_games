<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Hash;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', ['games' => $games ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //$game = Game::findOrFail($id);
        $request->validate([
            //    'image_name' => 'mimes:jpeg,bmp,png',
                'title'=> 'required',
                'info' => 'required|max:500',
                'price' => 'required',
                'release_date' => 'required|date',
                'contact_email' => 'required|email',
                'contact_phone' => 'required|digits:8',
                'game_image' => 'file|image'
            ]);
    
            $game_image = $request->file('game_image');
            $filename = $game_image->hashName();
    
            $path = $game_image->storeAs('public/images', $filename);
    
            // if validation passes create the new book
            $game = new Game();
            $game->title = $request->input('title');
            $game->info = $request->input('info');
            $game->price = $request->input('price');
            $game->release_date = $request->input('release_date');
            $game->contact_email = $request->input('contact_email');
            $game->contact_phone = $request->input('contact_phone');    
            $game->image_file =  $filename;
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
        $game = Game::findOrFail($id);

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
        $game = Game::findOrFail($id);

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
        $request->validate([
            'title'=> 'required',
            'info' => 'required|max:500',
            'price' => 'required',
            'release_date' => 'required|date',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|digits:8',
            'game_image' => 'file|image'
        ]);

        $game_image = $request->file('game_image');
        $filename = $game_image->hashName();

        $path = $game_image->storeAs('public/images', $filename);

        //Simiar to the structure for seeding 
        $game = new Game();
        $game->title = $request->input('title');
        $game->info = $request->input('info');
        $game->price = $request->input('price');
        $game->release_date = $request->input('release_date');
        $game->contact_email = $request->input('contact_email');
        $game->contact_phone = $request->input('contact_phone');
        $game->image_file =  $filename;
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
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.games.index');
    }
}
