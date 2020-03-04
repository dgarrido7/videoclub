<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movies;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index() {
            return response()->json( movies::all() );
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $p = new Movies;
                $count=0;

                if ($request->has('title')) {
                   $p->title = $request->input('title');
                   $count++;
                }
                if ($request->has('year')) {
                   $p->year = $request->input('year');
                   $count++;
                }
                if ($request->has('director')) {
                   $p->director = $request->input('director');
                   $count++;
                }
                if ($request->has('img')) {
                   $p->poster = $request->input('img');
                   $count++;
                }
                if ($request->has('synopsis')) {
                   $p->synopsis = $request->input('synopsis');
                   $count++;
                }
                if ($request->has('category_id')) {
                  $p->category_id = request('category_id');
                  $count++;
               }
               if ($request->has('trailer')) {
                  $p->trailer = request('trailer');
                  $count++;
               }
                if ($count==7) {
                   $p->save();
                }
                

                return response()->json( ['error' => false,
                          'msg' => 'La película se ha almacenado correctamente' ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return response()->json( movies::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
                $p = new Movies;
                $p = movies::findOrFail($id);
                $p->update($request->all());


                return response()->json( ['error' => false,
                          'msg' => 'La película se ha editado correctamente' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
                $p = new Movies;
                $p = movies::findOrFail($id);
                $p->delete();

                return response()->json( ['error' => false,
                          'msg' => 'La película se ha eliminado correctamente' ] );
    }

    public function putRent($id) {
    $m = movies::findOrFail( $id );
    if ($m->rented == true) {
    return response()->json( ['error' => true,
                          'msg' => 'La pelicula ja esta alquilada' ] );
    }
    else{
        $m->rented = true;
        $m->save();
        return response()->json( ['error' => false,
                          'msg' => 'La película se ha marcado como alquilada' ] );

    }
    }


    public function putReturn($id)
    {

        $p = new Movies;
        $p = movies::findOrFail($id);
        if ($p->rented == false) {
             return response()->json( ['error' => true,
                          'msg' => 'La pelicula no estaba alquilada' ] );
        
        }
        else{
        $p->rented = false;
        $p->save();
        return response()->json( ['error' => false,
                          'msg' => 'La película se ha marcado como devuelta' ] );
        }
    }
}
