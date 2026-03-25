<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectPageController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();
        $organizations = $user->organizations()->pluck('organizations.id');

        $projects = Project::whereIn('organization_id', $organizations)
            ->withCount(['tasks', 'timeEntries as entries_count'])
            ->withSum('timeEntries as total_duration', 'duration')
            ->get();

        return Inertia::render('Projects/Index', [
            'projects' => $projects,
        ]);
    }
}
