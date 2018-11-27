@extends('master-admin')

@section('title')
    Article - List
@endsection

@section('content')
    <div class="container">
        <h2 class="text-white">List of articles</h2>
        <table class="table table-hover table-dark mt-5">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @forelse($articles as $article)
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                @empty
                    <td colspan="100"><h4 class="text-center">There is not article yet</h4></td>
                @endforelse
            </tr>
            </tbody>
        </table>
        <a href="{{ route("articleCreate") }}" class="btn btn-success">Create an article</a>
    </div>
@endsection
