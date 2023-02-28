<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function loc()
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        return view('pages.include.locphim', compact('category', 'genre', 'country', 'hot_sidebar'));
    }

    public function loc_phim()
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();


        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        if ($sapxep == '' && $genre_get == '' && $country_get == '' && $year_get == '') {
            return redirect()->back();
        } else {
            if ($genre_get) {
                $movie = Movie::where('genre_id', $genre_get);
            } else if ($country_get) {
                $movie = Movie::where('country_id', $country_get);
            } else if ($year_get) {
                $movie = Movie::where('year', $year_get);
            } else if ($sapxep) {
                $movie = Movie::orderby('title', 'ASC');
            }
            $movies = $movie->orderBy('ngaycatnhat', 'DESC')->paginate(18);

            return view('pages.locphim', compact('category', 'genre', 'country', 'movies', 'hot_sidebar'));
        }
    }

    public function index()
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $category_home = Category::where('status', '1')->get();

        $phimhot = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->get();
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();
        $trailer = Movie::where('resolution', '4')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phimhot', 'hot_sidebar', 'trailer'));
    }

    public function year($year)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $year = $year;

        $movie = Movie::where('year', $year)->orderBy('ngaycatnhat', 'DESC')->paginate(18);
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();


        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'hot_sidebar'));
    }

    public function tag($tag)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $tag = $tag;

        $movie = Movie::where('tag', 'LIKE', '%' . $tag . '%')->orderBy('ngaycatnhat', 'DESC')->paginate(18);
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();


        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'hot_sidebar'));
    }

    public function category($slug)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $category_slug = Category::where('slug', $slug)->first();

        $movie = Movie::where('category_id', $category_slug->id)->orderBy('ngaycatnhat', 'DESC')->paginate(18);
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        return view('pages.category', compact('category', 'genre', 'country', 'category_slug', 'movie', 'hot_sidebar'));
    }
    public function genre($slug)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $genre_slug = Genre::where('slug', $slug)->first();

        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $movi) {
            $many_genre[] = $movi->movie_id;
        }

        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngaycatnhat', 'DESC')->paginate(18);
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'hot_sidebar'));
    }
    public function country($slug)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $country_slug = Country::where('slug', $slug)->where('status', '1')->first();

        $movie = Movie::where('country_id', $country_slug->id)->orderBy('ngaycatnhat', 'DESC')->paginate(18);
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'hot_sidebar'));
    }
    public function movie($slug)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();

        $movie = Movie::where('slug', $slug)->first();
        $related = Movie::where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->WhereNotIn('slug', [$slug])->get();
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        $episode_first = Episode::where('movie_id', $movie->id)->orderby('episode', 'ASC')->take(1)->first();

        $episode_count = Episode::where('movie_id', $movie->id)->get();
        $episode_count_list = $episode_count->count();

        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related', 'hot_sidebar', 'episode_first', 'episode_count_list'));
    }
    public function watch($slug, $tap)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();
        $movie = Movie::where('slug', $slug)->first();
        $hot_sidebar = Movie::where('phimhot', '1')->where('status', '1')->orderBy('ngaycatnhat', 'DESC')->take(10)->get();

        // if (isset($tap)) {
        //     $tapphim = $tap;
        // } else {
        //     $tapphim = 1;
        // }
        // $tapphim = substr($tap, 4, 1);
        // // dd($tapphim);

        $tap = $tap;

        $episode = Episode::where('movie_id', $movie->id)->where('episode', $tap)->first();
        $related = Movie::where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->WhereNotIn('slug', [$slug])->get();

        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'hot_sidebar', 'episode', 'tap', 'related'));
    }
    public function episode()
    {
        return view('pages.episode');
    }
}
