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
        <h1>
            @if ($post)
                {{ $post->username }}
            @else
                User
            @endif
        </h1>
        <hr>
        <div class="row ps-5">
            <div class="col-sm-12">
                @if ($post)
                    <div class="card text-center">
                        <img src="{{ url('storage/profile.png') }}" class="card-img-top" alt="..."
                            style="height:200px; width:fit-content; margin-inline:auto; border-bottom: 2px solid black">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Your Email id is: {{ $post->email }}</li>
                            <li class="list-group-item">Your Phone Number is: {{ $post->phone }}</li>
                            <li class="list-group-item">Your date of birth: {{ $post->dateofbirth }}</li>
                            <li class="list-group-item">We met at: {{ $post->created_at }}</li>

                        </ul>
                    </div>
                @else
                    <p class="text-danger">No Record Found</p>
                @endif

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
