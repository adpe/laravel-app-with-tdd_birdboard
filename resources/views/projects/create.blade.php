@extends ('layouts.app')

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">Let's start something new</h1>

        <form action="/projects"
              method="POST">
            @include('projects.partials.form', ['project' => new \App\Models\Project(), 'buttonText' => 'Create project'])
        </form>
    </div>
@endsection
