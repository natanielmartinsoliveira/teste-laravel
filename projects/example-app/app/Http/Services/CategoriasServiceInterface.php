<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoriasRepository;

Interface CategoriasServiceInterface
{

    public function __construct(CategoriasRepository $postRepositories);

    public function all();

  
}
