<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $request->validate([
            'sbd' => 'required|numeric|digits:8',
        ]);

        try {
            $student = $this->studentService->findBySbd($request->sbd);

            return view('search', ['student' => $student]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['sbd' => $e->getMessage()])->withInput();

        }
    }
}
