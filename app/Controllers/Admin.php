<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        // The RoleAuth filter handles authentication and authorization
        return view('admin_dashboard');
    }
}
