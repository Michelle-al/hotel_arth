<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        return NewsResource::collection(News::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return NewsResource::make(
            News::query()
                ->where([
                    'id' => 1
                ])
                ->get()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $resource = NewsResource::make(News::findOrFail($id));


        if ($request->hasFile('url')) {
            // Getting the sent file
            $file = $request->file('url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
            // Putting the file in said directory with said filename
            Storage::putFileAs('public/news', $file, $file_name);
            // Swapping file to path
            $request->url = '/storage/news/' . $file_name;
            // Modifies the file path in order to find it in the storage/public/hero
            $filepath = str_replace('storage/', 'public/', $resource->url);
            Storage::delete( $filepath );
        }

        // Updating database data : array_filter discard all empty fields beforehand.
        $resource->update(
            array_filter(
                [
                    'title' => $resource->setTranslation('title', $request->title),
                    'description' => $resource->setTranslation('description', $request-> subtitle),
                ]
            )
        );

        dd($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
