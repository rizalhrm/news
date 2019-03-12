<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\News;
use Redirect;
use Validator;

class NewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $search = $request->search;
        $status = $request->status;

        $query = Db::table('news');

        if ($search) {
            $query->where('news', 'LIKE', '%'.$search.'%');
        }

        if ($status) {
            $query->where('status', '=', $status);
        }

        $news = $query->paginate(5);

        // $category = Category::get();
        // dd($category);

        // foreach ($category as $row) {
        //     echo $row->category."<br>";
        // }

        return view('dashboard.news.list', ['news' => $news, 'search' => $search, 'status' => $status]);
    }
}
