<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Sla geüploade afbeeldingen op voor een specifiek project.
     */
    public function imageUpload(Request $request, Project $project)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store("projects/{$project->id}", 'public');

                $project->images()->create([
                    'path' => $path,
                ]);
            }

            return back()->with('success', 'Afbeelding(en) succesvol geüpload!');
        }

        return back()->with('error', 'Geen afbeeldingen gevonden om te uploaden.');
    }

    /**
     * Verwijder een specifieke afbeelding van een project.
     */
    public function deleteImage(Project $project, Image $image)
    {
        // Check of de afbeelding echt bij het project hoort
        if ($image->project_id !== $project->id) {
            return back()->with('error', 'Afbeelding hoort niet bij dit project.');
        }

        // Verwijder het bestand van de opslag
        Storage::disk('public')->delete($image->path);

        // Verwijder de record uit de database
        $image->delete();

        return back()->with('success', 'Afbeelding succesvol verwijderd!');
    }
}
