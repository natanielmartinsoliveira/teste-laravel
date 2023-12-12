<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoriasRepository;

class CategoriasService implements CategoriasServiceInterface
{
    /**
     * @var $postRepositories
     */
    protected $postRepositories;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function __construct(CategoriasRepository $postRepositories)
    {
        $this->postRepositories = $postRepositories;
    }

    public function all()
    {
        return $this->postRepositories->all();
    }


  
}
