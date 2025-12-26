<?php

namespace App\Services\Student;

interface StudentServiceInterface
{
    public function findBySbd($sbd);
    public function findByGroupA();
    public function chartScoreBySubject($subject);
    public function getTotal();
}