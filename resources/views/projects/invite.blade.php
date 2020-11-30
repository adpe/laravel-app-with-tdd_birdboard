<div class="card flex flex-col mt-3">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
        Invite a user
    </h3>

    <form action="{{ $project->path().'/invitations' }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="input bg-transparent border border-grey-light rounded py-2 px-3 text-xs w-full"
                   placeholder="Email address">
        </div>

        <button type="submit" class="button text-sm w-full">Invite</button>
    </form>

    @include ('errors', ['bag' => 'invitations'])
</div>
