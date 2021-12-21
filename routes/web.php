<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthorController;
use App\Models\Author;

// 5章：Eloquent
route::get('/',[AuthorController::class,'index']);
route::get('/find',[AuthorController::class,'find']);
route::post('find',[AuthorController::class,'search']);
// 6章：Eloquent
route::get('/author/{author}',[AuthorController::class,'bind']);
// 7章：Eloquent
route::get('/add', [AuthorController::class, 'add']);
route::post('/add', [AuthorController::class, 'create']);
route::get('/edit', [AuthorController::class, 'edit']);
route::post('/edit', [AuthorController::class, 'update']);
route::get('/delete', [AuthorController::class, 'delete']);
route::post('/delete', [AuthorController::class, 'remove']);

// 1章：DBクラス 2章：クエリビルダ
// route::get('/', [AuthorController::class, 'cls_index']);

// route::get('/add', [AuthorController::class, 'cls_add']);
// // route::post('/add', [AuthorController::class, 'cls_create']);

// route::get('/edit', [AuthorController::class, 'cls_edit']);
// route::post('/edit', [AuthorController::class, 'cls_update']);

// route::get('/delete', [AuthorController::class, 'cls_delete']);
// route::post('/delete', [AuthorController::class, 'cls_remove']);

// 8章：モデルリレーション
use App\Http\Controllers\BookController;

route::prefix('book')->group(function(){
  route::get('/',[BookController::class,'index']);
  route::get('/add', [BookController::class, 'add']);
  // Route::get('/add',function(){
  //   return print 'testasdf';
  // });
  // Route::post('/add', [BookController::class, 'create']);
  route::post('/add', function () {
    return print 'testasdf';
  });
});