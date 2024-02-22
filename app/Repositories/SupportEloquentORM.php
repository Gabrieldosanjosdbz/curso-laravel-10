<?php

use App\DTO\CreateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use App\DTO\UptadeSupportDTO;
use App\Models\Support;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    )
    {}

    public function getAll(string $filter = null): array
    {
        return $this->model
                        ->where(function ($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");
                        }
                    })
                    ->all()
                    ->toArray();         //To pegando o support pelo model
    }

    public function findOne(string $id): stdClass|null
    {
        $support = $this->model->find($id);
        if(!$support){
            return null;
        }
        
        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray(); 
    }

    public function update(UptadeSupportDTO $dto): stdClass|null
    {
        if(!$support = $this->model->find($dto->id)) {
            return null;
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }

}
