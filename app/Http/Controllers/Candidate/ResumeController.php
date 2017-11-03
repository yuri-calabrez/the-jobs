<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function show()
    {
        return view('app.candidates.resume');
    }
}
