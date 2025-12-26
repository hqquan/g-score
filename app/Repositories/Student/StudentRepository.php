<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{

    public function findBySbd($sbd)
    {
        return Student::where('sbd', $sbd)->first();
    }

    public function findByGroup(array $select, $limit = 10)
    {
        $students = Student::query()->select([
            'sbd',
            $select[0],
            $select[1],
            $select[2],
            DB::raw("({$select[0]} + {$select[1]} + {$select[2]}) as total_score")
        ])
            ->whereNotNull($select[0])
            ->whereNotNull($select[1])
            ->whereNotNull($select[2])
            ->orderByDesc('total_score')
            ->limit($limit)
            ->get();

        return $students;
    }

    public function filterScoreRangeBySubject($subject)
    {
        return DB::selectOne("
            SELECT
                SUM($subject >= 8) AS '>= 8',
                SUM($subject >= 6 AND $subject < 8) AS '6 - <8',
                SUM($subject >= 4 AND $subject < 6) AS '4 - <6',
                SUM($subject < 4) AS '< 4'
            FROM students
        ");
    }

    public function total()
    {
        return Student::count();
    }
}