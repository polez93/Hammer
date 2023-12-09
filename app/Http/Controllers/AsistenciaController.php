<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Empleado;
use App\Models\Horario;
use Illuminate\Http\Request;

/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }





    public function indexPorteria()
    {
        $asistencias = Asistencia::whereNull('hora_salida')->paginate();
        $horarios = Horario::all();
        $empleados = Empleado::all();

        return view('asistencia.index', compact('asistencias','horarios','empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistencia = new Asistencia();
        $asistencias = Asistencia::whereNull('hora_salida')->get();
        $UsuariosDentro = $asistencias->pluck('usuario.identificacion');
        $horarios = Horario::all();
        $empleados = Empleado::All();
        return view('asistencia.create', compact('asistencia','horarios','empleados','asistencias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'horario_id' => 'required'
        ]);
        $idHorario = $request->input('horario_id');
        $horarioEntrada = Horario::find($idHorario);
        echo($horarioEntrada);

        $empleado = $request->input('empleado_id');
        $horaEntrada = $request->input('hora_entrada');
        $novedad = "Sin novedad";
        if ($horaEntrada > $horarioEntrada->ingreso) {
            $novedad = "Entrada luego del horario establecido";
        }

        $asistencia = Asistencia::create([
            'horario_id' => $request->input('horario_id'),
            'empleado_id' => $empleado,
            'hora_entrada' => $request->input('hora_entrada'),
            'novedad' => $novedad
        ]);

        return redirect()->route('asistencias.show', $asistencia->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.edit', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('salidaPorteria')
            ->with('success', 'Egreso Exitoso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
}
