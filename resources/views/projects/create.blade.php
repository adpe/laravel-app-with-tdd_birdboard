<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birdboard</title>
</head>
<body>
    <form method="POST" action="/projects" class="container">
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
    </form>
</body>
</html>
