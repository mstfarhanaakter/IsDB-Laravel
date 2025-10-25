<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load applications with their environments and deployments
        $applications = Application::with('environments.deployments')->get();

        return view('applications.index', compact('applications'));
    }

}
