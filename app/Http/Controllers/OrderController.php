<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request, Course $course)
    {

        // dd($request->payment);

        $check = new Check;
        $check->user_id = $request->user()->id;
        $check->course_id = $course->id;
        // $check->name = $request->name;
        // $check->description = $request->description;
        $check->payment = $request->payment;
        $check->save();

        return redirect()->route('index')->with('success', 'Запись на курс успешно проведена!');
    }

}
