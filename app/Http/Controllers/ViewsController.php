<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;

class ViewsController extends Controller
{
    public function index()
    {
        $courses = Course::all()->map(function ($course) {
            return $course;
        });
        return view("index", [
            'courses' => $courses,
        ]);
    }
    public function course(Course $course)
    {
        return view("pages.course", [
            'course' => $course,
        ]);
    }
    public function register()
    {
        return view("pages.register");
    }

    public function login()
    {
        return view("pages.login");
    }
    public function orders()
    {
        return view("pages.orders");
    }
}
