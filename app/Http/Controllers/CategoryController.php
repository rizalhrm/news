<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Redirect;
use Validator;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $search = $request->search;
        $status = $request->status;

        $query = Db::table('category');

        if ($search) {
            $query->where('category', 'LIKE', '%'.$search.'%');
        }

        if ($status) {
            $query->where('status', '=', $status);
        }

        $category = $query->paginate(5);

        // $category = Category::get();
        // dd($category);

        // foreach ($category as $row) {
        //     echo $row->category."<br>";
        // }

        return view('dashboard.category.list', ['category' => $category, 'search' => $search, 'status' => $status]);
    }

    public function formKategori() {
        $url="simpanKategori";
        $tombol="Tambah Kategori";

        return view('dashboard.category.form', compact('url', 'tombol'));
    }

    public function simpan(Request $request, Category $category) {
        $validator = Validator::make($request->all(),
            [
                'category' => 'required|unique:category,category',
                'status' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('formKategori')
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $category->category=$request->category;
            $category->status=$request->status;
            $category->save();

            return redirect()->route('category');   
        }
    }

    public function formEditKategori($categoryId, Category $category) {

        $url="gantiKategori";
        $tombol="Ubah Kategori";

        $category = $category->where('id', $categoryId)
                            ->first();

        return view('dashboard.category.form', compact('category', 'url', 'tombol'));
    }

    public function ganti(Request $request, Category $category) {
        $validator = Validator::make($request->all(),
            [
                'category' => 'required|unique:category,category,'.$request->categoryId,
                'status' => 'required'
            ]
        );

        $category= $category::find($request->categoryId);

        if ($validator->fails()) {
            return redirect()->route('formEditKategori', compact('category'))
                             ->withErrors($validator)
                             ->withInput();
        } else {

        $category->category=$request->category;
        $category->status=$request->status;
        $category->update();

        return redirect()->route('category');

        }
    }

    public function hapus($categoryId, Category $category) {

        $category = $category->where('id', $categoryId)
                            ->delete();

        return redirect()->route('category');
    }

}