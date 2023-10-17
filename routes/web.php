<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProjectController as project;
use App\Http\Controllers\Backend\adminController as admin;
use App\Http\Controllers\Backend\ContactController as contact1;
use App\Http\Controllers\Backend\PostController as postcon;
use App\Http\Controllers\Backend\QueryController as querycon;
use App\Http\Controllers\Backend\EmployeeController as employee1;
use App\Http\Controllers\Backend\ClientsController as client1;
use App\Http\Controllers\Backend\CommentController as comment;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\blogpostController;
use App\Models\Backend\Post;
use App\Models\Backend\Query;
use App\Models\Backend\Employee;
use App\Models\Backend\Client;
use App\Models\Backend\Contact;
use App\Models\User;


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
    $postshow=Post::orderBy('created_at', 'desc')->where('status',1)->where('type',3)->limit(3)->get();
    $sershow=Post::orderBy('created_at', 'desc')->where('status',1)->where('type',2)->limit(6)->get();
    $aboutshow=Post::orderBy('created_at', 'desc')->where('status',1)->where('type',1)->limit(1)->get();
    $carshow=Post::orderBy('created_at', 'desc')->where('status',1)->where('type',4)->limit(3)->get();
    $queryshow=Query::orderby('created_at','asc')->where('status',1)->limit(5)->get();
    $queryshow1=Query::orderby('created_at','desc')->where('status',1)->limit(5)->get();
    $team=Employee::orderby('created_at','asc')->where('status',1)->limit(4)->get();
    $clientshow=Client::orderby('created_at','asc')->where('status',1)->limit(10)->get();
    $countclient=Client::count();
    $countemployee=Employee::count();
    $countcompleteproject=Post::where('type',0)->where('status',1)->count();
    $countrunningproject=Post::where('type',0)->where('status',2)->count();
  
   
    
    return view('frontend.page.landing', compact('postshow','sershow','queryshow','queryshow1','team','aboutshow',
        'carshow','clientshow','countclient','countemployee','countcompleteproject','countrunningproject'));
})->name('landing');
Route::get('/create',[contact1::class, 'create'])->name('contactcreate');
Route::post('/sent',[comment::class, 'store'])->name('commentsent');
Route::get('/show/{post:slug}',[postcon::class, 'show'])->name('postshow');
Route::get('/all-show',[postcon::class, 'blogshow'])->name('blogshow');

Route::group(['prefix'=>'/bg'],function(){
    Route::get('/service-show',[postcon::class, 'sershow'])->name('sershow');
    Route::get('/project-show',[postcon::class, 'projectshow'])->name('projectshow');
    Route::get('/team-show',[employee1::class, 'show'])->name('employeeshow');
    Route::get('/about',[employee1::class, 'aboutshows'])->name('aboutshow');


    });

Route::get('/admin', function () {
    $messagecount=Contact::where('read',0)->count();
    $admincount=User::where('role',0)->count();
    $servicecount=Post::where('type',2)->where('status',1)->count();
    $projectcount=Post::where('type',0)->where('status',1)->count();
    return view('backend.dashboard',compact('messagecount','admincount','servicecount','projectcount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix'=>'/category'],function(){
        Route::get('/addcategory',[CategoryController::class, 'create'])->name('createcategory');
        Route::post('/catinsert',[CategoryController::class, 'store'])->name('catinsert');
        Route::get('/catshow',[CategoryController::class, 'catshow'])->name('catshow');
        Route::get('/catedit/{id}',[CategoryController::class, 'catedit'])->name('catedit');
        Route::post('/catupdate/{id}',[CategoryController::class, 'update'])->name('catupdate');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('catdelete');
       
    });

  Route::group(['prefix'=>'/blog'],function(){
        Route::get('/create',[blogpostController::class, 'create'])->name('blogpostcreate');
        Route::post('/insert',[blogpostController::class, 'store'])->name('blogpoststore');
        Route::get('/manage',[blogpostController::class, 'index'])->name('blogpostmanage');
        Route::get('/edit/{id}',[blogpostController::class, 'edit'])->name('blogpostedit');
        Route::post('/update/{id}',[blogpostController::class, 'update'])->name('blogpostupdate');
        Route::get('/delete/{id}',[blogpostController::class, 'destroy'])->name('blogpostelete');

        });

        Route::group(['prefix'=>'/edit-admin'],function(){
            Route::get('/manage',[admin::class, 'index'])->name('adminmanage');
            Route::get('/edit/{id}',[admin::class, 'edit'])->name('adminedit');
            Route::post('/update/{id}',[admin::class, 'update'])->name('adminupdate');
            Route::get('/delete/{id}',[admin::class, 'destroy'])->name('admindelete');
    
            });
            Route::group(['prefix'=>'/contact'],function(){
                
                Route::post('/sent',[contact1::class, 'store'])->name('contactstore');
                Route::get('/manage',[contact1::class, 'index'])->name('contactmanage');
                Route::get('/update/{id}',[contact1::class, 'update'])->name('contactupdate');
                Route::get('/delete/{id}',[contact1::class, 'destroy'])->name('contactdelete');
                
        
                });
                Route::group(['prefix'=>'/comment'],function(){
                    Route::get('/manage',[comment::class, 'index'])->name('commentmanage');
                    Route::get('/edit/{id}',[comment::class, 'edit'])->name('commentedit');
                    Route::post('/update/{id}',[comment::class, 'update'])->name('commentupdate');
                    Route::get('/delete/{id}',[comment::class, 'destroy'])->name('commentdelete');
                    
            
                    });
                Route::group(['prefix'=>'/post'],function(){
                    Route::get('/create',[postcon::class, 'create'])->name('postcreate');
                    Route::post('/insert',[postcon::class, 'store'])->name('poststore');
                    Route::get('/manage',[postcon::class, 'index'])->name('postmanage');
                    Route::get('/edit/{id}',[postcon::class, 'edit'])->name('postedit');
                    Route::post('/update/{id}',[postcon::class, 'update'])->name('postupdate');
                    Route::get('/delete/{id}',[postcon::class, 'destroy'])->name('postdelete');
            
                    });
                    Route::group(['prefix'=>'/query'],function(){
                        Route::get('/create',[querycon::class, 'create'])->name('querycreate');
                        Route::post('/insert',[querycon::class, 'store'])->name('querystore');
                        Route::get('/manage',[querycon::class, 'index'])->name('querymanage');
                        Route::get('/edit/{id}',[querycon::class, 'edit'])->name('queryedit');
                        Route::post('/update/{id}',[querycon::class, 'update'])->name('queryupdate');
                        Route::get('/delete/{id}',[querycon::class, 'destroy'])->name('querydelete');
                
                        });
                        Route::group(['prefix'=>'/employee'],function(){
                            Route::get('/create',[employee1::class, 'create'])->name('employeecreate');
                            Route::post('/insert',[employee1::class, 'store'])->name('employeestore');
                            Route::get('/manage',[employee1::class, 'index'])->name('employeemanage');
                            Route::get('/edit/{id}',[employee1::class, 'edit'])->name('employeeedit');
                            Route::post('/update/{id}',[employee1::class, 'update'])->name('employeeupdate');
                            Route::get('/delete/{id}',[employee1::class, 'destroy'])->name('employeedelete');
                    
                            });
                            Route::group(['prefix'=>'/client'],function(){
                                Route::get('/create',[client1::class, 'create'])->name('clientcreate');
                                Route::post('/insert',[client1::class, 'store'])->name('clientstore');
                                Route::get('/manage',[client1::class, 'index'])->name('clientmanage');
                                Route::get('/edit/{id}',[client1::class, 'edit'])->name('clientedit');
                                Route::post('/update/{id}',[client1::class, 'update'])->name('clientupdate');
                                Route::get('/delete/{id}',[client1::class, 'destroy'])->name('clientdelete');
                        
                                });

});


require __DIR__.'/auth.php';
