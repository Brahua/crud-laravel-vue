<?php

namespace App\Http\Controllers\API;

use App\Pensamiento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PensamientoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return Pensamiento::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $pensamiento = new Pensamiento();
        $pensamiento->descripcion = $request->descripcion;
        $pensamiento->user_id = auth()->id();
        $pensamiento->save();

        return $pensamiento;
    }

    public function update(Request $request, $id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->descripcion = $request->descripcion;
        $pensamiento->save();
    }


    public function destroy($id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->delete();
    }
}
