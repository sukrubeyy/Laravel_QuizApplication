<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class App extends Controller
{
    public function phpInfo()
    {
        return phpinfo();
    }
}
