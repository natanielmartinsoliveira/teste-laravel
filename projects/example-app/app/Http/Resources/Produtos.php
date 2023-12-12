<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Produtos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request){

        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'validade' => $this->validade,
            'arquivo' => $this->arquivo,
            'categoria_id' => $this->categoria->id ?? null,
            'categoria' => $this->categoria->nome ?? null,
        ];
    }

}
