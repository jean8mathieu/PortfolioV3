@extends('master-admin')

@section('title')
    Article - List
@endsection

@section('content')
    <div class="container">
        <h2 class="text-white">List of projects</h2>
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
                @forelse($projects as $project)
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->user->name }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                @empty
                    <td colspan="100"><h4 class="text-center">There is not project yet</h4></td>
                @endforelse
            </tr>
            </tbody>
        </table>
        <a href="{{ route("project.create") }}" class="btn btn-success">Create an project</a>
    </div>
@endsection
