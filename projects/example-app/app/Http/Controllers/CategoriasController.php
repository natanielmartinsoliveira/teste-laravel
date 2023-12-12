<?php

namespace App\Http\Controllers;

use App\Http\Resources\Categorias;
use App\Http\Services\CategoriasService;

class CategoriasController extends Controller
{
    private $service;

    public function __construct(CategoriasService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $categorias = $this->service->all();
        return Categorias::collection($categorias);
    }

   
}
