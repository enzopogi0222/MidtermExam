<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function dashboard()
    {
        // The RoleAuth filter handles authentication and authorization
        return view('teacher_dashboard');
    }
}
