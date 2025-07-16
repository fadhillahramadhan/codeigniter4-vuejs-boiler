<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Data to pass to the Vue app (if needed)
        $data = [
            'title' => 'CodeIgniter 4 + Vue 3 - Welcome'
        ];

        return view('vue_app', $data);
    }
}
