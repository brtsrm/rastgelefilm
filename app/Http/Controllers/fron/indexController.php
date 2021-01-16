<?php

namespace App\Http\Controllers\fron;

use App\Http\Controllers\Controller;
use App\Models\film;
use App\Models\film_detail;
use App\Models\genres;
use App\Models\like_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index($id = null)
    {
        $total = genres::all();
        if (!is_null($id)) {
            $genres = genres::where("name_slug", "=", $id)->first();
            $getFilm = film::with("genresName")->with("filmDetail")->where("genres_id", "=", $genres->id)->inRandomOrder()->first();
        } else {
            $filmTotal = film::inRandomOrder()->first();
            $getFilm = film::with("genresName")->with("filmDetail")->inRandomOrder()->first();
        }
        return view("index", ["totals" => $total, "filmTotal" => $getFilm]);
    }
    public function status(Request $request)
    {

        if ($request->likeType == "like") {
            $status = 1;
        } else {
            $status = 0;
        }

        $oncedenOyVermis = like_type::where("ipAdress", "=", "{$request->ip()}")->where("film_id", "=", $request->filmId)->count();

        $result = like_type::updateOrCreate(
            ["film_id" => $request->filmId, "ipAdress" => $request->ip()],
            ["film_id" => $request->filmId, "like_type" => $status, "ipAdress" => $request->ip()]
        );

        if ($oncedenOyVermis) {
            
            if ($result["like_type"] == 1) {

                DB::update("update film_detail set like_total = like_total + 1, dislike_total = dislike_total - 1  where film_id = ?", [$request->filmId]);
            
            } else {
            
                DB::update("update film_detail set dislike_total = dislike_total + 1, like_total = like_total - 1  where film_id = ?", [$request->filmId]);
            }

        } else {

            if ($result["like_type"] == 1) {

                DB::update("update film_detail set like_total = like_total + 1  where film_id = ?", [$request->filmId]);

            } else {

                DB::update("update film_detail set dislike_total = dislike_total + 1  where film_id = ?", [$request->filmId]);
            }

        }
        return film_detail::where("film_id", $request->filmId)->first();
    }
}
