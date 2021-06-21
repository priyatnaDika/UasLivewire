@section('container')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Detail Game</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$games->name}}</h5>
                    <p class="card-text">{{$games->genre}}</p>
                    <p class="card-text">{{$games->deskripsi}}</p>

                    <a href="/game" class="card-link">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection