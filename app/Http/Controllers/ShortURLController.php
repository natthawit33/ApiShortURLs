<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;

class ShortURLController extends Controller
{
   
    public function create(Request $request)
    {
        $request->validate([
            'urlori' => 'required|url'
        ]);

        do {
            $shortUrl = Str::random(6);
        } while (Url::where('short_url', $shortUrl)->exists());

        $url = Url::create([
            'original_url' => $request->urlori,
            'short_url' => $shortUrl,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'URL created successfully',
            'data' => $url
        ], 201);
    }


    public function show($id)
    {
        $url = Url::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return response()->json(['data' => $url], 200);
    }

   
    public function index()
    {
        $myUrls = Url::where('user_id', auth()->id())->paginate(10);

        return response()->json(['data' => $myUrls], 200);
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'urlori' => 'required|url'
        ]);

        $url = Url::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $url->original_url = $request->urlori;
        $url->save();

        return response()->json([
            'message' => 'URL updated successfully',
            'data' => $url
        ], 200);
    }

   
    public function destroy($id)
    {
        $url = Url::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $url->delete();

        return response()->json([
            'message' => 'URL deleted successfully.'
        ], 200);
    }

    public function redirect($shortUrl)
    {
     
        $url = Url::where('short_url', $shortUrl)->first();
    
  
        if (!$url) {
            return response()->json(['error' => 'URL not found'], 404);
        }
    
     
        return response()->json(['original_url' => $url->original_url]);
    }
    
}
