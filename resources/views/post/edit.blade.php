<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->username }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 p-5">
                <h1>Create User</h1>
                <hr>

                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('alert-success'))
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Success</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Data Inserted Successfully
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('post.index') }}" class="btn btn-primary">Understood</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="mb-3">
                        <label for="exampleInputImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputImage" aria-describedby="ImageHelp"
                            name="image" accept="image/*">
                        <div id="ImageHelp" class="form-text">Please Upload a profile pic.</div>
                    </div> --}}
                    @if ($post)
                        <div class="mb-3">
                            <label for="exampleInputUserName" class="form-label">UserName</label>
                            <input type="text" class="form-control" id="exampleInputUserName"
                                aria-describedby="UserNameHelp" name="username" value={{ $post->username }} required>
                            <div id="UserNameHelp" class="form-text">Please Enter a username.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" value={{ $post->email }} required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="exampleInputPhone"
                                aria-describedby="phoneHelp" name="phone" value={{ $post->phone }} required>
                            <div id="phoneHelp" class="form-text">We'll never share your details with anyone else.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @else
                        <p class="text-danger">Something went wrong</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
