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
                        <th>Film Id</th>
                        <th>Film Adı</th>
                        <th>Film Resim</th>
                        <th>Film Kategori</th>
                        <th>Film Imdb Puanı</th>
                        <th>Film Beğeni</th>
                        <th>Film Beğenmedi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filmler as $film)
                    <tr>
                        <td>{{$film["id"]}}</td>
                        <td><img style="width:125px;height:150px;" src='{{$film->filmDetail["img"]}}' /></td>
                        <td>{{$film["name"]}}</td>
                        <td>{{$film->genresName["name"]}}</td>
                        <td>{{$film->filmDetail["imdb_puan"]}}</td>
                        <td>{{$film->filmDetail["like_total"]}}</td>
                        <td>{{$film->filmDetail["dislike_total"]}}</td>
                        <td><a href='{{route("admin.film-delete",$film->id)}}'><i class="fa fa-trash"
                                    aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection