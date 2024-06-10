<?php

namespace Admin\Asm\Model;

use Admin\Asm\Commons\Model;

class Flight extends Model
{
    public string $tableName = 'flights';

    public function paginate($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'f.id',
                'f.Origin',
                'f.Destination',
                'f.DepartureDate',
                'f.DepartureTime',
                'f.Price',
                'f.img',
                'f.category_id',
                'c.CategoryName', // Include category name field
                'f.description'
            )
            ->from($this->tableName, 'f')
            ->leftJoin('f', 'categories', 'c', 'f.category_id = c.id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('f.id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'f.id',
                'f.Origin',
                'f.Destination',
                'f.DepartureDate',
                'f.DepartureTime',
                'f.Price',
                'f.img',
                'c.CategoryName', // Join and select the category name
                'f.description'
            )
            ->from($this->tableName, 'f')
            ->leftJoin('f', 'categories', 'c', 'f.category_id = c.id')
            ->where('f.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function getTotalFlightCount()
    {
        return $this->queryBuilder
            ->select('COUNT(*) as total_count')
            ->from($this->tableName)
            ->fetchOne();
    }
    
}
