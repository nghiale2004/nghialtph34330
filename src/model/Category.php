<?php

namespace Admin\Asm\Model;

use Admin\Asm\Commons\Model;

class Category extends Model
{
    public string $tableName = 'categories';



    public function findByID($id)
    {
        return $this->queryBuilder
            ->select('c.id', 'c.CategoryName', 'c.Description')
            ->from($this->tableName, 'c')
            ->where('c.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function paginate($page = 1, $itemsPerPage = 10)
    {
        $offset = ($page - 1) * $itemsPerPage;

        $categories = $this->queryBuilder
            ->select('c.id', 'c.CategoryName', 'c.Description')
            ->from($this->tableName, 'c')
            ->setFirstResult($offset)
            ->setMaxResults($itemsPerPage)
            ->fetchAllAssociative();

        $totalItems = $this->queryBuilder
            ->select('COUNT(*)')
            ->from($this->tableName, 'c')
            ->fetchOne();

        $totalPage = ceil($totalItems / $itemsPerPage);

        return [$categories, $totalPage];
    }
}
