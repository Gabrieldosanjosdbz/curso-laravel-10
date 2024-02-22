<?php

namespace App\Services;

use stdClass;  // Importa a classe stdClass para ser usada como tipo de retorno em alguns métodos.
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;

class SupportService
{

    public function __construct(protected SupportRepositoryInterface $repository){}

    // Método para obter todos os elementos de suporte, opcionalmente filtrados por algum critério.
    public function getAll(string $filter = null): array
    {
       return $this->repository->getAll($filter);
    }

    // Método para encontrar um único elemento de suporte com base no ID.
    public function findOne(string $id): stdClass | null
    {      
        return $this->repository->findOne($id);
    }

    // Método para criar um novo elemento de suporte.
    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    // Método para atualizar um elemento de suporte existente.
    public function update(UpdateSupportDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }

    // Método para excluir um elemento de suporte com base no ID.
    public function delete(string $id): void
    {
        $this->repository->delete($id); 
    }
}
