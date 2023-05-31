<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //


        return redirect(route('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validar los datos del formulario

        $formulario = new Formulario();
        $formulario->nombref = $request->input('titulo');
        $formulario->des = $request->input('descripcion');
        $formulario->user_id = Auth::user()->id;

        $formulario->save();

        $preguntas = $request->pregunta;
        $respuestas = $request->respuesta;

        if (!is_null($preguntas) && is_array($preguntas) && count($preguntas) > 0) {
            foreach ($preguntas as $index => $pregunta) {
                $nuevaPregunta = new Pregunta();
                $nuevaPregunta->pregunta = $pregunta;
                $nuevaPregunta->tipo = $request->input('tipo')[$index];
                $nuevaPregunta->forms_id = $formulario->id;
                $nuevaPregunta->save();
            }
        }

        $formularios = Formulario::all();
        return view('home', compact('formularios'));

    }






    /**
     * Display the specified resource.
     * @param \App\Models\Formulario
     * @return \Illuminate\Http\Response
     */
    public function show(Formulario $formulario)
    {
    
        dd($formulario);

    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Formulario
     * @return \Illuminate\Http\Response
     */

    public function edit(Formulario $formulario)
    {
        //
        dd($formulario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulario $formulario)
    {
        //
    }
}
