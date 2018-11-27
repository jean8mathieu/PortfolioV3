@extends('master-admin')

@section('title')
    Article - Create
@endsection

@section('content')
    <div class="container text-white">
        <h2 class="text-center">{{ (isset($article) && $article->title ? "Updating " . $article->title : "Create an Article") }}</h2>

        <form id="createArticle" method="post" action="{{ route("articleCreateUpdate") }}">
            @csrf

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ $article->title ?? "" }}" required>

            <div class="mt-3"></div>

            <label>Short Description:</label>
            <input type="text" id="shortDescription" name="shortDescription" placeholder="Short Description" class="form-control" value="{{ $article->short_description ?? "" }}" required>

            <div class="mt-3"></div>

            <label>Description:</label>
            <textarea placeholder="Description" class="form-control" rows="15" required>{{ $article->description ?? "" }}</textarea>

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
