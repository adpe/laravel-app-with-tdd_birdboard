@extends ('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <div>{{ $project->description }}</div>
    <a href="/projects" class="btn btn-outline-secondary">Go back</a>
@endsection
