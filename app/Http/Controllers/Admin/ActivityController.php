<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super_admin|director');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::latest()->paginate(10);

        return view('activities.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $properties = json_decode($activity->properties);

        $olds = $properties->old ?? null;
        $attributes = $properties->attributes ?? null;

        return view('activities.show', compact('activity', 'olds', 'attributes'));
    }
}
