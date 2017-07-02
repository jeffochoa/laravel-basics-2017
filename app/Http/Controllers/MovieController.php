<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\NewMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Show movies list
     *
     * @return View
     */
    public function index()
    {
        $movies = Movie::all();
        $title = 'Movies list';
        return view('movies.list', compact('movies', 'title'));
    }

    /**
     * Show "new movie" form
     *
     * @return View
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Stores a new movie
     *
     * @param  Request $request
     *
     * @return Redirect to movies list passing a "success" var to the session
     */
    public function store(NewMovieRequest $request)
    {
        Movie::create($request->except('_token'));

        return redirect()->route('movie.index')
            ->withSuccess('New movie created.');
    }

    /**
     * Show "edit movie" form
     *
     * @param  Int $movie Movie id
     *
     * @return View
     */
    public function edit($movie)
    {
        $genres = Genre::all();
        $movie = Movie::find($movie);

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Updates a movie data
     *
     * @param  int  $movie   Movie id
     * @param  Request $request
     *
     * @return redirect to movies list passing a "success" var to the session
     */
    public function update($movie, UpdateMovieRequest $request)
    {
        $movie = Movie::find($movie)->update($request->except('_token', '_method'));

        return redirect()->to('/movie')
            ->withSuccess("Movie updated");
    }

    /**
     * Delete a movie
     *
     * @param  int $movie Movie id
     *
     * @return Redirect to movies list passing a "success" var to the session
     */
    public function destroy($movie)
    {
        Movie::find($movie)->delete();

        return redirect()->to('/movie')
            ->withSuccess("Movie deleted");
    }
}
