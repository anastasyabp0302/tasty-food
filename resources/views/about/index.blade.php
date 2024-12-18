<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FontAwesome 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Admin Dashboard - About List</title>
    <style>
        #sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .sidebar-profile {
            text-align: center;
            padding: 20px;
        }
        .sidebar-profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .sidebar-heading {
            font-size: 32px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .sidebar-profile h4 {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <h4 class="sidebar-heading">Dashboard</h4>
                    <div class="sidebar-profile">
                        <img src="admin.profile.jpeg" alt="Admin Profile Picture">
                        <h4>Admin Name</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">
                                <i class="fa-regular fa-newspaper"></i> News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">
                                <i class="fa-regular fa-images"></i> Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('about.index') }}">
                                <i class="fa-regular fa-address-card"></i> About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fa-regular fa-user"></i> Users
                            </a>
                        </li>
                        <!-- Logout Button -->
                        <li class="nav-item mt-3">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content (About List) -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">About List</h1>
                    <a href="{{ route('about.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Add New 
                    </a>
                    <a href="{{ route('about.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> View 
                    </a>
                </div>

                <!-- Flash Messages -->
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ Session::get('success') }}</b>
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <b>{{ Session::get('error') }}</b>
                    </div>
                @endif

                <!-- About Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($abouts->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No abouts found.</td>
                            </tr>
                        @else
                            @foreach ($abouts as $key => $about)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->description }}</td>
                                    <td class="text-center">
    @if ($about->image_path && (asset('app/public/' . $about->image_path)))
        <img src="{{ asset('storage/abouts/' . $about->image_path) }}" alt="About Image" width="100">
    @else
        <img src="{{ asset('images/placeholder.png') }}" alt="No Image" width="100">
    @endif
</td>
                                    <td class="text-center">
                                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="handleDelete({{ $about->id }})">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" id="form-delete-{{ $about->id }}" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script>
        const handleDelete = (id) => {
            if (confirm('Hapus data ini?')) {
                document.getElementById(`form-delete-${id}`).submit();
            }
        }
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-c5e0b3d4c2a4be8f5d1b70c61a865a3969de1cb8f1a8f1a75d1dbb7d1f6cd81f" crossorigin="anonymous"></script>
</body>

</html>
