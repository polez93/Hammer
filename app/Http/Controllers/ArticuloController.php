<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ArticuloController
 * @package App\Http\Controllers
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate();

        return view('articulo.index', compact('articulos'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }

    public function getAll()
    {
        $result = Articulo::All();

        return response()->json([
            'Titulo' =>'Triturados Hammer',
            'Autor' => 'Carlos Lopez',
            'result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo();
        return view('articulo.create', compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'foto' => 'required|image'
        ]);

        $foto = $request->file('foto')->store('public/articulos');
        $url = Storage::url($foto);

        $articulo = Articulo::create([
            'nombre' => $request->input('nombre'),
            'foto' =>$url,
            'descripcion' => $request->input('descripcion'),
            'precio'=>$request->input('precio')
        ]);

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        request()->validate(Articulo::$rules);

        $articulo->update($request->all());

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo Modificado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id)->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo eliminado con exito');
    }
}
