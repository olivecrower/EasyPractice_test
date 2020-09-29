<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('updated_at', 'desc')->get();
        return view('welcome')->with('movies', $movies);
    }

    public function addMovie(MovieRequest $request)
    {
        $movie = Movie::create($request->all());

        return response()->json([
            'message' => 'created',
            'movie' => $movie
        ], 201);
    }

    public function haveWatchedMovie($id)
    {
        $movie =  Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Could not find movie'
            ], 404);
        }

        $movie->haveWatched();

        return response()->json([
            'message' => $movie->name . ' was changed.',
            'movie' => $movie
        ], 200);
    }

    public function deleteMovie($id) {
        Movie::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ], 200);
    }
}
