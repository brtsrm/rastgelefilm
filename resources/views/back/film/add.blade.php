@extends('back.master')
@section("content")


<h1 class="mt-4">Filmler</h1>



<form action="{{route("admin.film-add-check")}}" method="post">

    <div class="form-group">
        <label for="">Film Kategori</label>
        <select class="form-control" name="film[genres_id]" id="">
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="inputFilmUrl" class="col-sm-2 col-form-label">Film Url</label>
        <input type="text" name="film[film_url]" class="form-control" id="inputFilmUrl" placeholder="Film Url">
    </div>
    <div class="form-group">
        <label for="inputFilmName" class="col-sm-2 col-form-label">Film İsmi</label>
        <input type="text" name="film[name]" class="form-control" id="inputFilmName" placeholder="Film İsmi">
    </div>
    <div class="form-group">
        <label for="filmImage" class="col-sm-2 col-form-label">Film Resim</label>
        <input type="text" name="filmDescription[img]" class="form-control" id="filmImage" placeholder="Film Resim">
    </div>
    <div class="form-group">
        <label for="textareaFilmDescription">Film Açıklaması</label>
        <textarea class="form-control p-3" name="filmDescription[description]" id="textareaFilmDescription"
            rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="inputFilmImdbPoint" class="col-sm-2 col-form-label">Film Imdb Puanı</label>
        <input minlength="3" maxlength="3" type="text" class="form-control" name="filmDescription[imdb_puan]" id="inputFilmImdbPoint"
            placeholder="Puan">
    </div>

    <div class="form-group">
        <label for="inputFilmOriginialName" class="col-sm-2 col-form-label">Film Orjinal İsmi</label>
        <input type="text" class="form-control" name="filmDescription[original_name]" id="inputFilmOriginialName"
            placeholder="Film Orjinal İsmi">
    </div>


    <div class="form-group">
        <label for="filmReleaseDate" class="col-sm-2 col-form-label">Film Yayın Tarihi</label>
        <input minlength="4" maxlength="4" type="text" class="form-control" name="filmDescription[year]" id="filmReleaseDate"
            placeholder="Film Yayın Tarihi">
    </div>


    <button type="submit" name="" id="" class="btn btn-primary float-right mt-5 btn-lg btn-block">Kaydet</button>

    @csrf

</form>


@endsection