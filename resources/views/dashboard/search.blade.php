<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Hasil Pencarian Buku</h1>

        @if(isset($query))
            <div class="alert alert-info">
                <strong>Pencarian:</strong> {{ $query }}
            </div>
        @endif

        @if(isset($results) && count($results) > 0)
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori ID</th>
                        <th scope="col">Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            <td>{{ $result->judul }}</td>
                            <td>{{ $result->penulis }}</td>
                            <td>Rp{{ number_format($result->harga, 0, ',', '.') }}</td>
                            <td>{{ $result->stok }}</td>
                            <td>{{ $result->kategori_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($result->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                Tidak ada hasil ditemukan.
            </div>
        @endif

        <a href="/dashboard" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
