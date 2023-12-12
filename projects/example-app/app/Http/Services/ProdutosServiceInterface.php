<?php

namespace App\Http\Services;

use App\Http\Repositories\ProdutosRepository;
use App\Models\Produtos;
use Illuminate\Http\Request;

Interface ProdutosServiceInterface
{

    public function __construct(ProdutosRepository $postRepositories);

    public function find(int $id);

    public function search(string $search);

    public function listAll();

    public function store(Request $produtos): Produtos;

    public function update(Request $produtos, int $id) : Produtos;

    public function delete(int $id) ;

    public function upload(Request $request) ;
  
}
