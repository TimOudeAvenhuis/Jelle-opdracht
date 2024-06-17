<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>likes</h1>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>likes
                            
                                <a href="{{ Route('like@create') }}" class="btn btn-primary float-end">Add like</a>
                            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Like Post</th>
                                    <th>Username</th>
                                    <th>Post Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($likes as $like)
                                    <tr>
                                        <td>{{ $like->id }}</td>
                                        <td>{{ $like->is_positive ? 'Ja' : 'Nee' }}</td>
                                        <td>{{ $like->user->username }}</td>
                                        <td>{{ $like->post->title }}</td>
                                        <td>
                                           
                                                <a href="{{ Route('like@edit', $like->id)}}"
                                                    class="btn btn-success">Edit</a>
                                            

                                                <a href="{{ Route('like@destroy', $like->id) }}"
                                                    class="btn btn-danger mx-2">Delete</a>
                                            
                                        </td>
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
</body>
