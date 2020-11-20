@extends ('layouts.app')

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">Edit Your Project</h1>

        <form action="{{ $project->path() }}"
              method="POST">
            @method('PATCH')
            @include('projects.partials.form', ['buttonText' => 'Update project'])
        </form>
    </div>
@endsection
