<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episode = Episode::all();
        return view('admincp.episode.index', compact('episode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = Movie::all();
        return view('admincp.episode.create', compact('movie'));
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

        $episode = new Episode();

        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['linkphim'];
        $episode->episode = $data['episode'];
        $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $episode->save();

        return redirect('episode')->with('message', 'Thêm tập phim thành công');
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

        $movie = Movie::all();
        $episode = Episode::find($id);
        return view('admincp.episode.edit', compact('movie', 'episode'));
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

        $episode = Episode::find($id);

        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['linkphim'];
        $episode->episode = $data['episode'];
        $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $episode->update();

        return redirect('episode')->with('message', 'Sửa tập phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id);
        $episode->delete();

        return redirect('episode')->with('message', 'Xóa tập phim thành công');
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option value="">---Episode---</option>';

        for ($i = 1; $i <= $movie->sotap; $i++) {
            if ($movie->sotap == 1) {
                $output .= '<option value="0">phim 1 tập</option>';
            } else {
                $output .= '<option value="' . $i . '">' .  $i . '</option>';
            }
        }
        echo $output;
    }
}
