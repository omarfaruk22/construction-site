<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProjectController as project;
use App\Http\Controllers\Backend\adminController as admin;
use App\Http\Controllers\Backend\ContactController as contact;
use App\Http\Controllers\Backend\PostController as blog;
use App\Http\Controllers\Backend\QueryController as query;
use App\Http\Controllers\Backend\EmployeeController as employee;
use App\Http\Controllers\Backend\ClientsController as client;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.page.landing');
});
Route::get('/create',[contact::class, 'create'])->name('contactcreate');

Route::get('/admin', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::group(['prefix'=>'/project'],function(){
        Route::get('/create',[project::class, 'create'])->name('projectcreate');
        Route::post('/insert',[project::class, 'store'])->name('projectstore');
        Route::get('/manage',[project::class, 'index'])->name('projectmanage');
        Route::get('/edit/{id}',[project::class, 'edit'])->name('projectedit');
        Route::post('/update/{id}',[project::class, 'update'])->name('projectupdate');
        Route::get('/delete/{id}',[project::class, 'destroy'])->name('projectdelete');

        });

        Route::group(['prefix'=>'/edit-admin'],function(){
            Route::get('/manage',[admin::class, 'index'])->name('adminmanage');
            Route::get('/edit/{id}',[admin::class, 'edit'])->name('adminedit');
            Route::post('/update/{id}',[admin::class, 'update'])->name('adminupdate');
            Route::get('/delete/{id}',[admin::class, 'destroy'])->name('admindelete');
    
            });
            Route::group(['prefix'=>'/contact'],function(){
                
                Route::post('/insert',[contact::class, 'store'])->name('contactstore');
                Route::get('/manage',[contact::class, 'index'])->name('contactmanage');
                Route::get('/update/{id}',[contact::class, 'update'])->name('contactupdate');
                Route::get('/delete/{id}',[contact::class, 'destroy'])->name('contactdelete');
        
                });
                Route::group(['prefix'=>'/blog'],function(){
                    Route::get('/create',[blog::class, 'create'])->name('blogcreate');
                    Route::post('/insert',[blog::class, 'store'])->name('blogstore');
                    Route::get('/manage',[blog::class, 'index'])->name('blogmanage');
                    Route::get('/edit/{id}',[blog::class, 'edit'])->name('blogedit');
                    Route::post('/update/{id}',[blog::class, 'update'])->name('blogupdate');
                    Route::get('/delete/{id}',[blog::class, 'destroy'])->name('blogdelete');
            
                    });
                    Route::group(['prefix'=>'/query'],function(){
                        Route::get('/create',[query::class, 'create'])->name('querycreate');
                        Route::post('/insert',[query::class, 'store'])->name('querystore');
                        Route::get('/manage',[query::class, 'index'])->name('querymanage');
                        Route::get('/edit/{id}',[query::class, 'edit'])->name('queryedit');
                        Route::post('/update/{id}',[query::class, 'update'])->name('queryupdate');
                        Route::get('/delete/{id}',[query::class, 'destroy'])->name('querydelete');
                
                        });
                        Route::group(['prefix'=>'/employee'],function(){
                            Route::get('/create',[employee::class, 'create'])->name('employeecreate');
                            Route::post('/insert',[employee::class, 'store'])->name('employeestore');
                            Route::get('/manage',[employee::class, 'index'])->name('employeemanage');
                            Route::get('/edit/{id}',[employee::class, 'edit'])->name('employeeedit');
                            Route::post('/update/{id}',[employee::class, 'update'])->name('employeeupdate');
                            Route::get('/delete/{id}',[employee::class, 'destroy'])->name('employeedelete');
                    
                            });
                            Route::group(['prefix'=>'/client'],function(){
                                Route::get('/create',[client::class, 'create'])->name('clientcreate');
                                Route::post('/insert',[client::class, 'store'])->name('clientstore');
                                Route::get('/manage',[client::class, 'index'])->name('clientmanage');
                                Route::get('/edit/{id}',[client::class, 'edit'])->name('clientedit');
                                Route::post('/update/{id}',[client::class, 'update'])->name('clientupdate');
                                Route::get('/delete/{id}',[client::class, 'destroy'])->name('clientdelete');
                        
                                });

});


require __DIR__.'/auth.php';
