<?php
    namespace Admin\Asm\Model;

    use  Admin\Asm\Commons\Model;

    class User extends Model{
        public string $tableName = 'users';
        public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }

    public function getUserCountBycreated_at()
    {
        // Query user count grouped by registration date
        $userCounts = $this->queryBuilder
            ->select('created_at', 'COUNT(id) as user_count')
            ->from($this->tableName)
            ->groupBy('created_at')
            ->fetchAllAssociative();

        // Format the result as an associative array
        $userCountByDate = [];
        foreach ($userCounts as $userCount) {
            $userCountByDate[$userCount['created_at']] = (int) $userCount['user_count'];
        }

        return $userCountByDate;
    }
    }