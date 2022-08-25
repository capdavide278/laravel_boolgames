<?php

namespace App\Http\Controllers;

use App\Videogame;
use App\Videogames;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VideogamesController extends Controller

{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videogames = Videogames::All();
        return view('videogames.index', compact('videogames'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('videogames.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*  dd($request); */
        $request->validate(
            [
                'nome'=> 'required',
                'descrizione'=>'required'
            ],
            [
                'nome.required'=>'Il campo :attribute è obbligatorio',
                'descrizione.required'=>'Il campo :attribute è obbligatorio'                                                                                                                                                            
            ]
        );

        $data = $request->all();
      
        
        //definiamo una nuova istanza
        $new_game = new Videogames();
            //richiamiamo l' istanzza per inserire i dati con fill
            $new_game -> fill($data);
            //salvarei dati
            $new_game -> save();

            return redirect()->route('videogames.show', $new_game);
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Videogames $videogames)
    {
        return view('videogames.show', compact('videogames'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videogames $videogame)

    {
        if (Auth::id() != $videogame->user_id) abort(401);

        // TODO: inplement soft deleting
        // $videogames->tags()->sync([]); // equivalente a detach()
        $videogame->tags()->detach();
        $videogame->delete();

        return redirect()->route('videogames.index')->with('deleted', "Il videogames <strong>{$videogame->nome}</strong> è stato eliminato");
    }

    public function getSlug(Request $request) {
        // /admin/getslug?nome=Questo è il titolo
        $nome = $request->query('nome');
        $slug = Videogames::getSlug($nome);

        return response()->json([
            'success'   => true,
            'response'  => $slug
        ]);
    }
}

