<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Admin Home',
        ];

        return view('Admin/Home/index', $data);
        }   
}
