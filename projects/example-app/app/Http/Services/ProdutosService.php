<?php

namespace App\Http\Services;

use App\Http\Repositories\ProdutosRepository;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosService implements ProdutosServiceInterface
{
    /**
     * @var $postRepositories
     */
    protected $postRepositories;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function __construct(ProdutosRepository $postRepositories)
    {
        $this->postRepositories = $postRepositories;
    }

    public function find(int $id)
    {
        return $this->postRepositories->find($id);
    }

    public function search(string $search)
    {
        return $this->postRepositories->search($search);
    }

    public function listAll()
    {
        return $this->postRepositories->listAll();
    }

    public function store(Request $request): Produtos
    {
        return $this->postRepositories->store($request);
    }

    public function update(Request $request,int $id) : Produtos 
    {
        return $this->postRepositories->update( $request, $id );
    }

    public function delete(int $id) 
    {
        return $this->postRepositories->delete($id);
    }

    public function upload(Request $request)
    {
        return $this->postRepositories->upload($request);
    }

  
}
