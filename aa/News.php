<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class News extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $guarded = [];

    public $timestamps = true;




    public function posts(){

     $posts = News::orderBy('created_at','desc')->paginate(8);

     return $posts;


    }

    public function post(){

     $post = News::orderBy('created_at','desc')->limit(6)->get();

     return $post;
}
    public function drasatposts(){

     $post = DB::table('News')->where('hashtag', '4')->get();
     return $post;
}
    public function epreeposts(){

     $post = DB::table('News')->where('hashtag', '1')->get();
     return $post;
}
    public function egyptposts(){

     $post = DB::table('News')->where('hashtag', '2')->get();
     return $post;
}

    public function worldposts(){

     $post = DB::table('News')->where('hashtag', '5')->get();
     return $post;
}
    public function plastienposts(){

     $post = DB::table('News')->where('hashtag', '3')->get();
     return $post;
}
    public function arabicposts(){

     $post = DB::table('News')->where('hashtag', '7')->get();
     return $post;
}
    public function newscollposts(){

     $post = DB::table('News')->where('hashtag', '6')->get();
     return $post;
}






    public function nwes(){

     $nwes = News::orderBy('created_at','desc')->limit(1)->get();
     return $nwes;

}
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
        ->width(412)
        ->height(412);
        $this->addMediaConversion('inimgsmall')
        ->width(100)
        ->height(70);



        $this->addMediaConversion('square')
        ->width(412)
        ->height(412)
        ->sharpen(10);
}
}
