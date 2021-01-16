@extends("front.master")
@section("content")
@section("title",$filmTotal->name)
@section("description",$filmTotal->filmDetail->description)


<div class="slider sliderv2">
  <div class="container">
    <div class="col-md-12">
      <div class="hero-ct">
        <h2 class="film-title "> {{$filmTotal->name}} </h2><br />

        <ul class="breadcumb film-genres ">
          <li>{{$filmTotal->genresName->name}}</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{$filmTotal->film_url}}" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="like-status">
  <div id="like" data-type="like" data-video-id="{{$filmTotal->id}}" class="col-md-6 bg-darkblue like">
    <div class="col-md-8">
      <p class="like-text">Beğendim <i class="fa fa-thumbs-up" aria-hidden="true"></i></p>
    </div>
    <div class="col-md-4">
      <h1 class="like-text" id="like-total">
        {{$filmTotal->filmDetail->like_total}}
      </h1>
    </div>

  </div>
  <div id="dislike" data-type="dislike" data-video-id="{{$filmTotal->id}}"
    class="col-md-6 dislike bg-darkred like-border-left">

    <div class="col-md-8">
      <p class=" like-text">Beğenmedim <i class="fa fa-thumbs-down " aria-hidden="true "></i></p>
    </div>
    <div class="col-md-4">
      <h1 class="like-text" id="dislike-total">
        {{$filmTotal->filmDetail->dislike_total}}
      </h1>
    </div>
  </div>
</div>

<div class="latestnew full-width ">
  <div class="row ">
    <div class="col-md-12 ">
      <!-- <div class="ads adsv2 ">
                  <img src="images/uploads/ads2.png " alt=" ">
              </div> -->
      <div class="latestnewv2 ">
        @foreach($totals as $total)
        <div class="blog-item-style-2 col-md-2 ">
          <div class="blog-it-infor text-center">
            <h2><a href='{{route("gender",$total->name_slug)}}'>{{$total->name}}</a></h2>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
<div class="latestnew ">
  <div class="container ">
    <div class="row ipad-width ">
      <div class="col-md-12 ">
        <div class="title-hd ">
          <h2>Film Hakkında Bilgi</h2>
        </div>
        <div class="tabs ">
          <div class="tab-content ">
            <div id="tab31 " class="tab active ">
              <div class="row ">
                <div class="blog-item-style-1 film-detail">
                  <img class="film-detail-img" src="{{$filmTotal->filmDetail->img}} " alt=" ">
                  <div class="blog-it-infor ">
                    <h2 class="film-title "> Film Adı : {{$filmTotal->filmDetail->original_name}} </h2><br />
                    <p>

                      {{$filmTotal->filmDetail->description}}

                    </p>
                    <div class="col-md-12 film-about ">
                      <div class="ceb-item-style-2 ">
                        <div class="ceb-infor text-center ">
                          <h2><a>IMDB PUANI</a></h2>
                          <h2><a>{{$filmTotal->filmDetail->imdb_puan}}</a></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer v2 section-->
@endsection

@section("footer_js")
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $("#like, #dislike").on("click",function(){
    let videoId = $(this).data("video-id"); 
    let videoType = $(this).data("type");
    $.ajax({
      method : "POST",
      url : "/status",
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
      data : {
        filmId   : videoId,
        likeType : videoType 
      },
      success : function(response){
        $("#like-total").html(response.like_total);
        $("#dislike-total").html(response.dislike_total);
        console.log(response);
      }
    })
  });
</script>

@endsection