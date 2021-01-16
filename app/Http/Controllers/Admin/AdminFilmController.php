<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\film;
use App\Models\film_detail;
use App\Models\genres;
use Illuminate\Support\Facades\Request;

class AdminFilmController extends Controller
{
    public function film()
    {

        $filmler = film::with("filmDetail")->with("genresName")->orderBy("id", "desc")->get();
        return view("back.film.index", compact("filmler"));
    }

    public function filmAddView()
    {
        $genres = genres::all();
        return view("back.film.add", compact("genres"));
    }

    public function filmAdd(Request $request)
    {
        $film = Request::except("_token");
        $filmLastId = film::create($film["film"])->id;
        $filmDescriptionRequest = $film["filmDescription"];
        $filmDescription = film_detail::create(
            [
                "film_id" => $filmLastId,
                "img" => $filmDescriptionRequest["img"],
                "description" => $filmDescriptionRequest["description"],
                "imdb_puan" => $filmDescriptionRequest["imdb_puan"],
                "original_name" => $filmDescriptionRequest["original_name"],
                "year" => $filmDescriptionRequest["year"],
                "like_total" => 1,
                "dislike_total" => 1,
            ]
        )->save();

        toastr()->success('Başarılı', 'Başarılı Şekilde Film eklenmiştir');
        return redirect("/admin/film");
    }

    public function filmDelete($id)
    {

        $filmDelete = film::find($id);
        $filmDelete->delete();

        if ($filmDelete) {
            toastr()->success('Başarılı', 'Başarlı Bir şekilde veriniz silinmiştir...');
            return redirect()->back();
        }

    }
}
