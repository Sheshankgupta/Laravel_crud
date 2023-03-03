<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-5">
        <h1>Users List</h1>
        <hr>
        <div class="row ps-5">
            <div class="col-sm-12">
                @if (is_countable($posts) && count($posts) > 0)
                    <table class="table table-stripped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">UserName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->dateofbirth }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="d-flex gap-3 justify-content-around">
                                        @if (!$user->deleted_at)
                                            <a href="{{ Route('post.show', $user->id) }}"
                                                class="btn btn-success">Read</a>
                                            <a href="{{ Route('post.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ Route('post.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Remove</button>
                                            </form>
                                        @else
                                            <a href="{{ Route('post.softDelete', $user->id) }}"
                                                class="btn btn-warning">Recover</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                @else
                    <p class="text-danger">No users found</p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script>
        toastr.options = {
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-bottom-left',
            'preventDuplicates': false,
            'onclick': null,
            'showDuration': '300',
            'hideDuration': '500',
            'timeOut': '3000',
            'extendedTimeOut': '200',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut'
        }
    </script>
    <script>
        $(document).ready(function() {
            @if (Session::has('alert-success'))
                toastr.success("{{ Session::get('alert-success') }}");
            @endif
            @if (Session::has('Deletion-recovered'))
                toastr.success("{{ Session::get('Deletion-recovered') }}");
            @endif
        });
    </script>
</body>

</html>
