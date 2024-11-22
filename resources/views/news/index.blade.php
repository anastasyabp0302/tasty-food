<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Admin Dashboard - News List</title>
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
                        <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">
                            <i class="fa-regular fa-images"></i> Gallery
                            </a>
                        </li>
                        <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.index') }}">
                            <i class="fa-regular fa-images"></i> About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">
                            <i class="fa-regular fa-user"></i> Users
                            </a>
                        </li>
                        
                         <!-- Tambahkan tombol Logout -->
            <li class="nav-item mt-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">List News</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewsModal">
                      <i class="fa-solid fa-plus"></i> Tambah
                    </button>

                    <a href="{{ url('/berita') }}" class="btn btn-success">
                    <i class="fa-solid fa-eye"></i> View
                </a>
                </div>

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <b>{{ Session::get('success') }}</b>
                </div>
                @elseif (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    <b>{{ Session::get('error') }}</b>
                </div>
                @endif


                <!-- News Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Preview</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $n)
                        <tr class="align-middle text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset("news-images/$n->image") }}" class="img-thumbnail" style="max-width: 150px; height: auto;" 
                                alt="image">
                            </td>
                            <td>{{ $n->title }}</td>
                            <td class="text-start">{{ Str::limit($n->content, 50) }}</td>
                            <td>
                                <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning mb-2">
                                    <i class="fa-solid fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-danger" onclick="handleDelete({{ $n->id }})">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                                <form action="{{ route('news.destroy', $n->id) }}" method="POST" id="form-delete-{{ $n->id }}" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <div class="modal fade" id="createNewsModal" tabindex="-1" aria-labelledby="createNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="createNewsModalLabel">Tambah News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Input Judul -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <!-- Input Isi -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Isi</label>
                        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                    </div>
                    <!-- Input Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <!-- Error Handling -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const openNewsModal = document.getElementById('openNewsModal');
const createNewsModal = new bootstrap.Modal(document.getElementById('createNewsModal'));
openNewsModal.addEventListener('click', () => {
    createNewsModal.show();
</script>


    <script>
        const handleDelete = (id) => {
            if (confirm('Hapus data ini?')) {
                document.getElementById(`form-delete-${id}`).submit();
            }
        } 
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-c5e0b3d4c2a4be8f5d1b70c61a865a3969de1cb8f1a8f1a75d1dbb7d1f6cd81f"
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-c5e0b3d4c2a4be8f5d1b70c61a865a3969de1cb8f1a8f1a75d1dbb7d1f6cd81f"
    crossorigin="anonymous"></script>
</body>

</html>
