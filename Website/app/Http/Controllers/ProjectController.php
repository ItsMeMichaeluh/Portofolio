<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Iluminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\SentEmail;

class ProjectController extends Controller
{

    // Haal alle projecten op
    public function index()
    {
        $sentEmails = SentEmail::latest()->get();
        $technologies = Technology::all();
        $projects = Project::all();
        return view('contact', compact('projects','technologies','sentEmails'));
    }

    public function school()
    {
        $sentEmails = SentEmail::latest()->get();
        $technologies = Technology::all();
        $projects = Project::all();
        return view('index.school', compact('projects','technologies','sentEmails'));
    }

    // Toon details van een specifiek project
    public function show(Project $project)
    {
        // Haal alle technologieën en de bijbehorende images op voor dit project
        $technologies = Technology::all();
        return view('projects_show', compact('project', 'technologies'));
    }


    // Toon het formulier om een nieuw project aan te maken
    public function create(Project $project)
    {
        $technologies = Technology::all();  // Haal alle technologieën op
        return view('create_project', compact('technologies', 'project'));
    }

    public function dashboard()
    {
        $sentEmails = SentEmail::latest()->get();
        $projects = Project::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('projects', 'sentEmails'));
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
        }

        return redirect()->route('dashboard')->with('success', 'Project succesvol toegevoegd!');
    }

    // Werk het project bij
    public function update(Request $request, Project $project)
    {
        // Valideer de inkomende gegevens
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

        // Werk de projectgegevens bij zonder de thumbnail en technologieën
        $project->update($request->only(['title', 'introduction', 'body', 'url', 'github']));

        // Verwerk de thumbnail afbeelding als deze is geüpload
        if ($request->hasFile('thumbnail')) {
            // Verwijder de oude thumbnail als deze bestaat
            if ($project->thumbnail) {
                Storage::delete('public/' . $project->thumbnail);
            }

            // Sla de nieuwe thumbnail op
            $project->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
            $project->save();
        }

        // Update de technologieën (indien geselecteerd)
        if ($request->has('technologies')) {
            // Zet de geselecteerde technologieën om naar hun ID's
            $technologyIds = $request->input('technologies');
            // Sync de technologieën met het project
            $project->technologies()->sync($technologyIds);
        }

        // Verwerk de geüploade afbeeldingen (als ze er zijn)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Sla de afbeeldingen op
                $path = $imageFile->store('projects/' . $project->id, 'public');
                $project->images()->create(['path' => $path]);
            }
        }

        // Redirect terug naar de projectpagina (show) met succesbericht
        return redirect()->route('dashboard', $project->id)->with('success', 'Project succesvol bijgewerkt!');
    }




    // Verwijder een project
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Project succesvol verwijderd!');
    }
}
