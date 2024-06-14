<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<h1>Comments</h1>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                {{-- @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif --}}

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Users
                            @can ('create comments')
                                <a href="{{ url('comments/create') }}" class="btn btn-primary float-end">Add Comment</a>
                            @endcan                 
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Content</th>
                                    <th>Username</th>
                                    <th>Post Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->user->username }}</td>
                                        <td>{{ $comment->post->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>