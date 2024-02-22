<?php

namespace App\Repositories;
use App\DTO\CreateSupportDTO;
use App\DTO\UptadeSupportDTO;
use stdClass;

interface SupportRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateSupportDTO $DTO): stdClass;
    public function update(UptadeSupportDTO $dto): stdClass|null;
}