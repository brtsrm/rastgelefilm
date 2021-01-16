@extends("back.master")
@section("content")

<h1 class="mt-4">Filmler <a name="" id="" class="btn btn-primary float-right " href="{{route("admin.film-add")}}"
        role="button">Film Ekle</a>
</h1>

<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50%">Kategori Adı</th>
                        <th width="50%">Kategorideki Film Sayısı</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($genres as $genre)
                    <tr>
                        <td>{{$genre->name}}</td>
                        <td>{{$genre->filmTotal()}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection