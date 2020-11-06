@extends ('layouts.app')

@section('content')
    <form method="POST" action="/projects">
        <h1>Create a Project</h1>
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create project</button>
        <a href="/projects" class="btn btn-link">Cancel</a>
    </form>
@endsection
