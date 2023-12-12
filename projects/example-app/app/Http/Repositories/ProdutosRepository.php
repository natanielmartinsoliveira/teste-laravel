<?php

namespace App\Http\Repositories;

use App\Models\Categorias;
use App\Models\Produtos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosRepository 
{
    /**
     * @var Produtos
     */
    protected $produtos;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function __construct(Produtos $produto)
    {
        return $this->produtos = $produto;
    }

    public function find(int $id)
    {
        return $this->produtos->with('categoria')->find($id);
    }

    public function search(string $search)
    {
        return $this->produtos->search($search);
    }

    public function listAll()
    {
        return $this->produtos->with('categoria')->paginate(10);
    }

    public function store(Request $request): Produtos
    {
        $data = $request->all();
        $data['validade'] = Carbon::parse($data['validade']);
        $model = $this->produtos->create($data);

        $categoria = Categorias::where('id', $data['categoria_id'])->first(); 
        $model->categoria()->associate($categoria);
        $model->save();
        return $model;
    }

    public function update(Request $request, int $id) : Produtos
    {
        $produto = $this->produtos->findOrFail( $id );
        $data = $request->all();
        $data['validade'] = Carbon::parse($data['validade']);
        $produto->update( $data );
        $categoria = Categorias::where('id', $data['categoria_id'])->first(); 
        $produto->categoria()->associate($categoria);
        $produto->save();
        return $produto;
    }

    public function delete(int $id) 
    {
        $produto = $this->produtos->findOrFail( $id );
        return $produto->delete();
    }

    public function upload(Request $request) 
    {

        $file_data = $request->input('file');
        $file_name = 'image_' . time() . '.png'; //generating unique file name;

        if ($file_data != "") { // storing image in storage/app/public Folder
            Storage::disk('public')->put($file_name, base64_decode($file_data));
        }
        return $file_name;

    }
    
  
}
