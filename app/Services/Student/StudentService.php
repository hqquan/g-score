<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Repositories\Student\StudentRepositoryInterface;

class StudentService implements StudentServiceInterface
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
    public function findBySbd($sbd)
    {
        $student = $this->studentRepository->findBySbd($sbd);

        if (!$student) {
            throw new \Exception("Student with SBD {$sbd} not found.");
        }
        return $student;
    }

    public function findByGroupA()
    {
        $students = $this->studentRepository->findByGroup(['toan', 'vat_li', 'hoa_hoc'], 10);

        return $students;
    }

    public function chartScoreBySubject($subject)
    {
        $data = $this->studentRepository->filterScoreRangeBySubject($subject);

        $result = [
            'labels' => array_keys((array) $data),
            'values' => array_values((array) $data)
        ];

        return $result;
    }

    public function getTotal()
    {
        return $this->studentRepository->total();
    }
}