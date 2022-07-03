<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Feed</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myfeed') }}">My Feed</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" role="button">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-4">
            <form action="{{ route('postupload') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="new-post-title">Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title" id="new-post-title" required>
                </div>
                <div class="form-group">
                    <label for="new-post">Post Text</label>
                    <textarea name="text" id="new-post" cols="30" rows="3" class="form-control" placeholder="Write On Your Mind" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>

            @foreach ($datas["posts"] as $post)
            <div class="card mt-4">
                <div class="card-header">{{ $post['title'] }}</div>
                <div class="card-body">{{ $post['text'] }}</div>
                <div class="card-footer">Author</div>
            </div>
            @endforeach
        </div>
    </body>
</html>
