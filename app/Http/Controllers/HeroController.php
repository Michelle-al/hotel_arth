<?php

namespace App\Http\Controllers;

use App\Http\Resources\HeroResource;
use App\Http\Resources\NewsResource;
use App\Models\Hero;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HeroResource::make(Hero::first());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $slug)
    {
          $resource = HeroResource::make(Hero::where('slug', $slug)->firstOrFail());

          $validatedData = $request->post();

        if ($request->hasFile('media_url')) {
            // Getting the sent file
            $file = $request->file('media_url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
            // Putting the file in said directory with said filename
            Storage::putFileAs('public/hero', $file, $file_name);
            // Swapping file to path
            $validatedData['media_url'] = '/storage/hero/' . $file_name;
            // Modifies the file path in order to find it in the storage/public/hero
            $old_filepath = str_replace('storage/', 'public/', $resource->media_url);
            Storage::delete( $old_filepath );
        }

        // Updating database data : array_filter discard all empty fields beforehand.

        $resource->update($validatedData);

        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
