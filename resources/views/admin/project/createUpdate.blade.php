@extends('master-admin')

@section('title')
    Article - Create
@endsection

@section('content')
    <div class="container text-white">
        <h2 class="text-center">{{ (isset($project) && $project->title ? "Updating " . $project->title : "Create an Project") }}</h2>

        <form id="createProject" method="post" action="{{ route("articleCreateUpdate") }}">
            @csrf

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ $project->title ?? "" }}" required>

            <div class="mt-3"></div>

            <label for="github">Github:</label>
            <input type="url" id="github" name="github" placeholder="Github" class="form-control" value="{{ $project->github ?? "" }}" required>

            <div class="mt-3"></div>

            <label>Short Description:</label>
            <input type="text" id="shortDescription" name="shortDescription" placeholder="Short Description" class="form-control" value="{{ $project->short_description ?? "" }}" required>

            <div class="mt-3"></div>

            <label>Description:</label>
            <textarea placeholder="Description" class="form-control" rows="15" required>{{ $project->description ?? "" }}</textarea>

            <div class="mt-3"></div>

            <label>Small image <small>Display on the homepage</small></label>
            <input type="file" class="form-control">

            <div class="mt-3"></div>

            <label>Large image <small>Display in the article</small></label>
            <input type="file" class="form-control">

            <div class="mt-3"></div>

            <button type="button" class="btn btn-primary w-100">Create</button>
        </form>
    </div>
@endsection
