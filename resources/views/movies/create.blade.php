@extends('layout')

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <h4>New movie</h4>
        <form class="form" method="POST" action="{{ route('movie.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input class="form-control" type="number" step="0.01" min="0" name="rating" id="rating" value="{{ old('rating') }}">
            </div>
            <div class="form-group">
                <label for="awards">Awards</label>
                <input class="form-control" type="number" min="0" name="awards" id="awards" value="{{ old('awards') }}">
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input class="form-control" type="date" name="release_date" id="release_date" value="{{ old('release_date') }}">
            </div>
            <div class="form-group">
                <label for="length">Length (in hours)</label>
                <input class="form-control" type="number" step="0.1" name="length" id="length" value="{{ old('length') }}">
            </div>
            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select class="form-control" id="genre_id" name="genre_id">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}"
                            @if(old('genre_id') == $genre->id) selected @endif> {{ $genre->name }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success"> Save </button>
        </form>
    </div>
@endsection