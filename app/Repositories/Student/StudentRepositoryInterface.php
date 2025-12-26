<?php

namespace App\Repositories\Student;

interface StudentRepositoryInterface
{
    public function findBySbd($sbd);
    public function findByGroup(array $select, $limit);
    public function filterScoreRangeBySubject($subject);
    public function total();
}