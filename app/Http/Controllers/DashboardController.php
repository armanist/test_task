<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Dcblogdev\MsGraph\MsGraph;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('dashboard', [
            'isConnected' => (new MsGraph)->isConnected()
        ]);
    }


}
