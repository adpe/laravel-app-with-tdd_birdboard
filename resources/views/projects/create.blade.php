@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects" class="text-grey text-sm font-normal no-underline">My Projects</a>
            </p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <form action="/projects" method="POST" class="w-full">
        @csrf

        <div class="flex -mx-3">
            <div class="w-full px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-grey font-normal mb-6">Create a Project</h2>

                    <div class="w-full mb-6">
                        <label class="block uppercase text-grey text-xs mb-2" for="title">Title</label>
                        <input type="text" class="card w-full" name="title" placeholder="Add title...">
                    </div>
                    <div class="w-full mb-6">
                        <label class="block uppercase text-grey text-xs mb-2" for="description">Description</label>
                        <textarea class="card w-full" style="min-height: 200px" name="description" placeholder="Add description..."></textarea>
                    </div>
                    <div class="w-full">
                        <button type="submit" class="button">Create project</button>
                        <a href="/projects">Cancel</a>
                    </div>
                </div>
            </div>
    </form>
@endsection
