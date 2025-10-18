<?php

namespace App\Controllers;

class Announcement extends BaseController
{
    public function index()
    {
        return view('announcements');
    }
}
