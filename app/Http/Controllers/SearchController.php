<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Student\StudentServiceInterface;

class SearchController extends Controller
{
    protected $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        try {
            $request->validate([
                'sbd' => 'required|numeric|digits:8',
            ]);
            $student = $this->studentService->findBySbd($request->sbd);

            return view('search', ['student' => $student]);
        } catch (\Exception $error) {
            return back()->with('notFound', $error->getMessage());
        }
    }
}
