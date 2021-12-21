<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Author;

// laravel応用
class AuthorController extends Controller
{
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_index(){
        // $itemsdumy=DB::select('select * from authors');
        $itemsdumy = db::table('authors')->get();
        return view('index',['items'=>$itemsdumy]);
    }
    // 5章：Eloquent
    public function index()
    {
        $items = Author::all();
        return view('index', ['items' => $items]);
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_add(){
        return view('add');
    }
    // 7章：Eloquent
    public function add()
    {
        return view('add');
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_create(Request $request){
        $param=[
            'name'=>$request->name,
            'age'=>$request->age,
            'nationality'=>$request->nationality,
        ];
        // db::insert('insert into authors (name,age,nationality) values (:name,:age,:nationality)',$param);
        db::table('authors')->insert($param);
        return redirect('/');
    }
    // 7章：Eloquent
    public function create(Request $request)
    {
        $this->validate($request, Author::$rules);
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_edit(Request $request){
        // $param=['id'=>$request->id];
        // $item=db::select('select * from authors where id = :id',$param);
        // return view('edit',['form'=>$item[0]]);
        $item=db::table('authors')->where('id',$request->id)->first();
        return view('edit',['form'=>$item]);
    }
    // 7章：Eloquent
    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_update(Request $request){
        $param=[
            'id'=>$request->id,
            'name'=>$request->name,
            'age'=>$request->age,
            'nationality'=>$request->nationality,
        ];
        // db::update('update authors set name =:name,age =:age, nationality =:nationality where id=:id',$param);
        db::table('authors')->where('id',$request->id)->update($param);
        return redirect('/');
    }
    // 7章：Eloquent
    public function update(Request $request)
    {
        $this->validate($request, Author::$rules);
        $form = $request->all();
        unset($form['_token']);
        Author::where('id', $request->id)->update($form);
        return redirect('/');
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_delete(request $request){
        // $param=['id'=>$request->id];
        // $item=db::select('select * from authors where id = :id',$param);
        // return view('delete',['form'=>$item[0]]);
        $item=db::table('authors')->where('id',$request->id)->first();
        return view('delete',['form'=>$item]);
    }
    // 7章：Eloquent
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['form' => $author]);
    }
// ------------------------------------------------------------
    // 1章：DBクラス 2章：クエリビルダ
    public function cls_remove(request $request){
        $param=['id'=>$request->id];
        // db::delete('delete from authors where id = :id',$param);
        db::table('authors')->where('id',$request->id)->delete();
        return redirect('/');
    }
    // 7章：Eloquent
    public function remove(request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }
// ------------------------------------------------------------
    // 5章：Eloquent
    public function find()
    {
        return view('find', ['input' => '']);
    }
    // 5章：Eloquent(find検索) 6章：Eloquent(where検索)
    public function search(request $request)
    {
        // $item=Author::find($request->input);
        // $item = Author::where('name', 'LIKE', "%{$request->input}%")->first(); //部分一致
        $item = Author::where('name', $request->input)->first(); //全一致
        $param = [
            'item' => $item,
            'input' => $request->input
        ];
        return view('find', $param);
    }
    // 6章：Eloquent(モデル検索結合)
    public function bind(Author $author)
    {
        $data = [
            'item' => $author,
        ];
        // authorフォルダー内のbinds.blade.phpに$data.itemを渡す
        return view('author.binds', $data);
    }
}