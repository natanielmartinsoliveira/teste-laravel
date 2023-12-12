<?php

namespace App\Http\Repositories;

use App\Models\Categorias;

class CategoriasRepository
{
    /**
     * @var Categorias
     */
    protected $categorias;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function __construct(Categorias $categoria)
    {
        return $this->categorias = $categoria;
    }

    public function all()
    {
        return $this->categorias->all();
    }

    
  
}
