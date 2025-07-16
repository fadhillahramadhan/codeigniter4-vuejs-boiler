<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // You can fetch data from models here
        $data = [
            'title' => 'Dashboard',
            'currentPage' => 'dashboard',
            'userData' => [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com'
            ],
            'stats' => [
                'totalUsers' => 123,
                'totalPosts' => 1250,
                'activeUsers' => 45
            ]
        ];

        return view('vue_app', $data);
    }
}
