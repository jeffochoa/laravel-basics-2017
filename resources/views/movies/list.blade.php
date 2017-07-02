@extends('layout')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Awards</th>
                    <th>Release Date</th>
                    <th>Lenght</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->rating }}</td>
                        <td>{{ $movie->awards }}</td>
                        <td>{{ $movie->release_date->toFormattedDateString() }}</td>
                        <td>{{ $movie->length }}</td>
                        <td>{{ !empty($movie->genre) ? $movie->genre->name : 'none' }}</td>
                        <td>
                            <a href="{{ route('movie.edit', [$movie->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <a data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" href="{{ route('movie.destroy', [$movie->id]) }}" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection