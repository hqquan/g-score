<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $studentService;
    protected $total;
    protected $types;
    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
        $this->total = $this->studentService->getTotal();
        $this->types = [
            'chart' => [
                'toan',
                'ngu_van',
                'ngoai_ngu',
                'vat_li',
                'hoa_hoc',
                'sinh_hoc',
                'lich_su',
                'dia_li',
                'gdcd',
            ],
            'table' => [
                'top10',
            ]
        ];
    }

    public function index()
    {
        return view('report', [
            'total' => $this->total,
            'types' => $this->types,
        ]);
    }

    public function handle(Request $request)
    {
        $type = $request->input('type');

        if (in_array($type, $this->types['chart'])) {

            return $this->handleChart($request);
        } elseif (in_array($type, $this->types['table'])) {
            return $this->handleTable($request);
        } else {
            return redirect()->route('report.index');
        }
    }

    public function handleChart(Request $request)
    {
        $subject = $request->input('type');
        $chart = $this->studentService->chartScoreBySubject($subject);

        return view('report', [
            'subject' => $subject,
            'chart' => $chart,
            'types' => $this->types,
            'total' => $this->total,
        ]);
    }

    public function handleTable(Request $request)
    {
        $students = $this->studentService->findByGroupA();

        return view('report', [
            'students' => $students,
            'types' => $this->types,
            'total' => $this->total,
        ]);
    }
}
