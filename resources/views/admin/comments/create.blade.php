<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
    
                @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4>Create Comment
                            <a href="{{ Route('comment@read') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('comment@store') }}" method="POST">
                            @csrf
    
                            <div class="mb-3">
                                <label for="">Content</label>
                                <input type="text" name="content" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Username</label>
                                <select name="username" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{$user->username}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Title</label>
                                <select name="title" class="form-control">
                                    @foreach ($posts as $post)
                                        <option value="{{ $post->id }}">
                                            {{$post->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
