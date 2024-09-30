<?php

namespace App\Http\Controllers;

use App\Exceptions\UrlNotFoundException;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    
    public function index()
    {
        return Url::orderBy('created_at','desc')->paginate();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255|url',
        ]);

        $url = Url::where("original_url", $request->original_url)->first();
        
        if($url != null) {
            return $url;
        }
        
        return Url::create([
            'title' => Str::ucfirst($request->title),
            'original_url' => $request->original_url,
            'shortener_url' =>  Str::random(5)
        ]);
    
    }

    public function edit(Url $url)
    {
        return view('urls.edit', [
            'url' => $url,
        ]);
    }

    public function update(Request $request, Url $url)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255|url',
        ]);

        $validated['shortener_url'] = Str::random(5);
        
        $url->update($validated);
        
        return $url;
    }

    public function destroy(Url $url)
    {
        $url->delete();
        return redirect(route('urls.index'));
    }

    public function shortenLink($shortener_url)
    {
        $find = Url::where('shortener_url', $shortener_url)->first();
        
        if($find == null){
            throw new UrlNotFoundException();
        }


        return redirect($find->original_url);
    }
}