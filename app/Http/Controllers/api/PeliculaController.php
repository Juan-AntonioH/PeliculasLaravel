<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\MovieRequest;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Src\DTO\PeliculasDTO;
use Src\Service\IPeliculasService;
use Src\Service\impl\ImplPeliculasService;

class PeliculaController extends Controller
{
    private IPeliculasService $service;
    function __construct()
    {
        $this->middleware(
            'auth:api',
            ['except' => ['index', 'show']]
        );
        $this->service = new ImplPeliculasService(); //peliculaServiceimpl
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $peliculas = $this->service->all();

        return response()->json($peliculas, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request): JsonResponse
    {
        // request()->validate(
        //     [
        //         'titulo' => 'required|min:3',
        //         'anyo' => 'required|numeric|min:4',
        //         'duracion' => 'required|numeric|min:0',
        //         'director_id' => 'required|numeric'
        //     ],
        //     [
        //         'titulo.required' => 'El título es obligatorio',
        //         'anyo' => 'Pon bien la editorial',
        //         'duracion' => 'Solo números',
        //         'director_id' => 'Solo números'
        //     ]
        // );

        $pelicula = new PeliculasDTO(
            null,
            $request->titulo,
            $request->anyo,
            $request->duracion,
            $request->director_id
        );
        return response()->json($this->service->insert($pelicula), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        // $pelicula = Pelicula::findOrFail($id);
        // return response()->json($pelicula, 200);
        return response()->json($this->service->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $pelicula = new PeliculasDTO(
            null,
            $request->titulo,
            $request->anyo,
            $request->duracion,
            $request->director_id
        );
        return response()->json($this->service->update($pelicula,$id), 200);

        // $pelicula = Pelicula::findOrFail($id);
        // $pelicula->titulo = $request->titulo;
        // $pelicula->anyo = $request->anyo;
        // $pelicula->duracion = $request->duracion;
        // $pelicula->director_id = $request->director_id;
        // $pelicula->save();
        // return response()->json($pelicula, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $pelicula = Pelicula::destroy($id);
        return response()->json($pelicula, 200);
    }
    public function actores($id): JsonResponse
    {
        return response()->json($this->service->actores($id));
        // return response()->json(Pelicula::findOrFail($id)->actor, 200);
    }
    public function directores($id)
    {
        return response()->json(Pelicula::findOrFail($id)->director, 200);
    }
}
