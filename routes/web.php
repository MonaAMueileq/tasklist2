<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('todo', function () {

    //$tasks = DB::table('tasks')->get();
    $tasks = Task::all();
   // dd($tasks);
    return view('todo' , compact('tasks'));
});

Route::post('store', function (Request $request) {
    $task = new Task ;
    $task->title = $request->title ;
    $task->save();
    return redirect() ->back();
});

Route::delete('/{id}', function ($id) {
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
});
