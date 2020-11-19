<div class="card flex flex-col mt-3" style="height: 200px">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
        Invite a user
    </h3>

    <form action="{{ $project->path().'/invitations' }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="border border-grey rounded w-full py-2 px-3" placeholder="Email address">
        </div>

        <button type="submit" class="text-xs button">Invite</button>
    </form>

    @include ('errors', ['bag' => 'invitations'])
</div>