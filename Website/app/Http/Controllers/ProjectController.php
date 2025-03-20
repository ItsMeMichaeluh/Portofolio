<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        return view('projects.create', compact('technologies'));
    }

    public function dashboard()
    {
        $projects = Project::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('projects'));
    }

    // Sla het nieuwe project op
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'body' => 'required|string',
            'url' => 'nullable|url',
            'github' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Maak een nieuw project aan en vul de gegevens in
        $project = new Project();
        $project->title = $request->title;
        $project->introduction = $request->introduction;
        $project->body = $request->body;
        $project->url = $request->url;
        $project->github = $request->github;
        $project->user_id = auth()->id(); // Voeg de gebruiker toe aan het project

        // Verwerk de thumbnail afbeelding als er een bestand is geüpload
        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Sla het project op
        $project->save();

        // Voeg de technologieën toe aan het project
        $project->technologies()->sync($request->technologies);

        return redirect()->route('dashboard')->with('success', 'Project succesvol toegevoegd!');
    }

    // Toon het formulier om een project te bewerken
    public function edit(Project $project)
    {
        $technologies = Technology::all();  // Haal alle technologieën op
        return view('projects.edit', compact('project', 'technologies'));
    }

    // Werk het project bij
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'body' => 'required|string',
            'url' => 'nullable|url',
            'github' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Verwerk de thumbnail afbeelding
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Werk het project bij
        $project->update($data);
        $project->technologies()->sync($request->technologies);  // Werk technologieën bij

        return redirect()->route('projects.index')->with('success', 'Project succesvol bijgewerkt!');
    }

    // Verwijder een project
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project succesvol verwijderd!');
    }
}
