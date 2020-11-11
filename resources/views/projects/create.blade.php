@extends ('layouts.app')

@section('content')
    <form action="/projects" method="POST" class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">Let's start something new</h1>

        <div class="field mb-6">
            <label class="label uppercase text-grey text-xs block mb-2" for="title">Title</label>

            <div class="control">
                <input type="text"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                       name="title"
                       placeholder="My next awesome project">
            </div>
        </div>

        <div class="field mb-6">
            <label class="label uppercase text-grey text-xs block mb-2" for="description">Description</label>

            <div class="control">
                <textarea name="description"
                          class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                          rows="10"
                          placeholder="I should start learning piano."></textarea>
            </div>
        </div>

        <div class="field">
            <button type="submit" class="button mr-2">
                Create project
            </button>
            <a class="text-grey text-sm" href="/projects">
                Cancel
            </a>
        </div>
    </form>
@endsection
