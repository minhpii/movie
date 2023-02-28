<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::all();
        return view('admincp.movie.index', compact('movie'));
    }

    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function filter_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderby('ngaycatnhat', 'DESC')->take(10)->get();
        $output = '';
        foreach ($movie as $mov) {
            if ($mov->resolution == 0) {
                $text =  'SD';
            } elseif ($mov->resolution == 1) {
                $text =  'HD';
            } elseif ($mov->resolution == 2) {
                $text =  'CAM';
            } elseif ($mov->resolution == 3) {
                $text =  'FullDH';
            } else {
                $text =  'Trailer';
            }
            $output .= '  <div class="item post-37176">
            <a href="' . route('movie', $mov->slug) . '" title="' . $mov->title . '">
                <div class="item-link">
                    <img src="' . url('upload/movie/' . $mov->image) . '" class="lazy post-thumb"
                        alt="" title="' . $mov->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $mov->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>';
        }
        echo $output;
    }

    public function filter_default(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', 0)->orderby('ngaycatnhat', 'DESC')->take(10)->get();
        $output = '';
        foreach ($movie as $mov) {
            if ($mov->resolution == 0) {
                $text =  'SD';
            } elseif ($mov->resolution == 1) {
                $text =  'HD';
            } elseif ($mov->resolution == 2) {
                $text =  'CAM';
            } elseif ($mov->resolution == 3) {
                $text =  'FullDH';
            } else {
                $text =  'Trailer';
            }
            $output .= '  <div class="item post-37176">
            <a href="' . route('movie', $mov->slug) . '" title="' . $mov->title . '">
                <div class="item-link">
                    <img src="' . url('upload/movie/' . $mov->image) . '" class="lazy post-thumb"
                        alt="" title="' . $mov->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $mov->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();
        $movie = Movie::all();
        return view('admincp.movie.create', compact('category', 'genre', 'country', 'movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $movie = new Movie();

        $movie->title = $data['title'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];

        foreach ($data['genre_id'] as $gen) {
            $movie->genre_id = $gen[0];
        }

        $movie->country_id = $data['country_id'];
        $movie->phimhot = $request->phimhot == true ? '1' : '0';
        $movie->resolution = $request['resolution'];
        $movie->phude = $request['phude'];
        $movie->thoiluong = $request['thoiluong'];
        $movie->tag = $data['tag'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->status = $request->status == true ? '1' : '0';
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycatnhat = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/movie', $filename);
            $movie->image = $filename;
        }
        $movie->save();

        //them nhieu the loai cho film
        $movie->movie_genre()->attach($data['genre_id']);


        return redirect('movie')->with('message', 'Thêm phim thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('status', '1')->get();
        $genre = Genre::where('status', '1')->get();
        $country = Country::where('status', '1')->get();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;

        return view('admincp.movie.edit', compact('category', 'genre', 'country', 'movie', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $movie = Movie::find($id);

        $movie->title = $data['title'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];

        foreach ($data['genre_id'] as $gen) {
            $movie->genre_id = $gen[0];
        }

        $movie->country_id = $data['country_id'];
        $movie->phimhot = $request->phimhot == true ? '1' : '0';
        $movie->resolution = $request['resolution'];
        $movie->phude = $request['phude'];
        $movie->thoiluong = $request['thoiluong'];
        $movie->tag = $data['tag'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->status = $request->status == true ? '1' : '0';
        $movie->ngaycatnhat = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasFile('image')) {

            $destination = 'upload/movie/' . $movie->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/movie', $filename);
            $movie->image = $filename;
        }

        $movie->update();

        $movie->movie_genre()->sync($data['genre_id']);

        return redirect('movie')->with('message', 'Cật nhật phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $destination = 'upload/movie/' . $movie->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();

        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete();

        return redirect('movie')->with('message', 'Xóa phim thành công');
    }
}
