<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Produtos as ProdutosResource;
use App\Http\Services\ProdutosService;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    private $service;

    public function __construct(ProdutosService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = $this->service->listAll();
        return ProdutosResource::collection($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $validator = Validator::make($data, [
            'nome' => ['required', 'max:50'],
            'descricao' => ['required', 'max:200'],
            'preco' => ['required', 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/'],
            'validade' => ['required', 'date']
        ]);
        if($validator->fails()) return response()->json(array(
            'code'      =>  401,
            'message'   =>  'Error'
        ), 401); 
        $produtos = $this->service->store($request);
        return new ProdutosResource($produtos);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produtos = $this->service->find($id);
        return new ProdutosResource( $produtos );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
 
        $data =  $request->all();
        $validator = Validator::make($data, [
            'nome' => ['required', 'max:50'],
            'descricao' => ['required', 'max:200'],
            'preco' => ['required', 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/'],
            'validade' => ['required', 'date']
        ]);
        if($validator->fails()) return response()->json(array(
            'code'      =>  401,
            'message'   =>  'Error'
        ), 401); 
        $produtos = $this->service->update($request, $id);
        return new ProdutosResource( $produtos );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtos = $this->service->delete($id);
        if( !$produtos ){
            return new ProdutosResource( $produtos );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function upload(Request $request)
    {
        $produtos = $this->service->upload($request);
       
        return response()->json(array(
            'code'      =>  201,
            'filename'   =>  $produtos 
        ), 201); 
       
    }
}
