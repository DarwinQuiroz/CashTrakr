<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function show(Request $request) {}

    public function swap(Request $request, string $plan) {}

    public function cancel(Request $request) {}

    public function resume(Request $request) {}
}
