<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Iluminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Haal alle projecten op
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Toon details van een specifiek project
    public function show(Project $project)
    {
        return view('projects_show', compact('project'));
    }

    // Toon het formulier om een nieuw project aan te maken
    public function create()
    {
        $technologies = Technology::all();  // Haal alle technologieën op
        return view('create_project', compact('technologies'));
    }

    public function dashboard()
    {
        $projects = Project::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('projects'));
    }

    public function store(Request $request) {


        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'body' => 'required|string',
            'url' => 'nullable|url',
            'github' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'nullable|array', // Zorg ervoor dat dit als array wordt gevalideerd
            'technologies.*' => 'string|max:50',
        ]);

        // Maak een nieuw project
        $project = Project::create([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'url' => $request->url,
            'github' => $request->github,
            'technologies' => $request  ->technologies,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('thumbnail')){
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = $thumbnailFile->storeAs("projects/{$project->id}", $thumbnailFile->getClientOriginalName(), 'public');
            $project->update(['thumbnail' => $thumbnailPath]);
        }

        if ($request->hasFile('images')){
            foreach( $request->file('images') as $imageFile) {
                $imagePath = $imageFile->storeAs("projects/{$project->id}", $imageFile->getClientOriginalName(), 'public');

                Image::create([
                    'path' => $imagePath,
                    'project_id' => $project->id,
                ]);
            }
        }
        // Koppel de technologieën aan het project
        if ($request->has('technologies')) {
            $technologyIds = $request->technologies; // De geselecteerde IDs direct opslaan
            $project->technologies()->sync($technologyIds);
            $project->technologies()->sync($technologyIds);
        }

        return redirect()->route('dashboard')->with('success', 'Project succesvol toegevoegd!');
    }



    // Toon het formulier om een project te bewerken
    public function edit(Project $project)
    {
        $technologies = Technology::all();  // Haal alle technologieën op
        return view('projects.update', compact('project', 'technologies'));
    }

    // Werk het project bij
    public function update(Request $request, Project $project){

        $technologies = Technology::all();  // Haal alle technologieën op
        return view('projects.edit', compact('project', 'technologies'));

    $request->validate([
        'title' => 'required|string|max:255',
        'introduction' => 'required|string',
        'body' => 'required|string',
        'url' => 'nullable|url',
        'github' => 'nullable|url',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'technologies' => 'nullable|array',
        'technologies.*' => 'exists:technologies,id',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Update projectgegevens
    $project->update($request->only(['title', 'introduction', 'body', 'url', 'github']));

    // Verwerk de thumbnail afbeelding als er een bestand is geüpload
    if ($request->hasFile('thumbnail')) {
        $project->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        $project->save();
    }

    // Update technologieën
    if ($request->has('technologies')) {
        $technologyIds = Technology::whereIn('name', $request->technologies)->pluck('id')->toArray();
        $project->technologies()->sync($technologyIds);
    }

    return redirect()->route('projects.index')->with('success', 'Project succesvol bijgewerkt!');
}


    // Verwijder een project
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project succesvol verwijderd!');
    }
}
