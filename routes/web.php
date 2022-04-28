<?php

use App\Http\Controllers\Adm\AuthController;
use App\Http\Controllers\Adm\DashController;
use App\Http\Controllers\Adm\HighlightController;
use App\Http\Controllers\Adm\MceUploadController;
use App\Http\Controllers\Adm\PostController;
use App\Http\Controllers\Adm\SlideController;
use App\Http\Controllers\Adm\VideoController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // MCE Upload
    Route::post('/mce_upload', MceUploadController::class)->name('mce_uplaod');


    Route::middleware([Authenticate::class])->group(function () {
        Route::get('/', [DashController::class, 'home'])->name('dash');

        // Post //
        // Post CRUD 
        Route::get('/artigos', [PostController::class, 'index'])->name('artigos.index');
        Route::get('/artigos/criar', [PostController::class, 'create'])->name('artigos.create');
        Route::post('/artigos/criar', [PostController::class, 'store'])->name('artigos.store');
        Route::get('/artigos/{post}/show', [PostController::class, 'show'])->name('artigos.show');
        Route::get('/artigos/{post}/editar', [PostController::class, 'edit'])->name('artigos.edit');
        Route::post('/artigos/{post}/editar', [PostController::class, 'update'])->name('artigos.update');
        Route::get('/artigos/{post}/deletar', [PostController::class, 'destroy'])->name('artigos.destroy');

        // Post Search
        Route::post('/artigos/pesquisar', [PostController::class, 'search'])->name('artigos.search.ajax');
        Route::get('/artigos/pesquisar/{search}', [PostController::class, 'search'])->name('artigos.search');

        // Post-Category Crud
        Route::get('/artigos/categorias', [PostController::class, 'categoriasIndex'])->name('artigos.categorias.index');
        Route::get('/artigos/categorias/criar', [PostController::class, 'categoriasCreate'])->name('artigos.categorias.create');
        Route::post('/artigos/categorias/criar', [PostController::class, 'categoriasStore'])->name('artigos.categorias.store');
        Route::get('/artigos/categorias/{category}/editar', [PostController::class, 'categoriasEdit'])->name('artigos.categorias.edit');
        Route::post('/artigos/categorias/{category}/editar', [PostController::class, 'categoriasUpdate'])->name('artigos.categorias.update');
        Route::get('/artigos/categorias/{category}/deletar', [PostController::class, 'categoriasDestroy'])->name('artigos.categorias.destroy');

        // SLides //
        Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
        Route::get('/slides/criar', [SlideController::class, 'create'])->name('slides.create');
        Route::post('/slides/criar', [SlideController::class, 'store'])->name('slides.store');
        Route::post('/slides/sortable', [SlideController::class, 'sortable'])->name('slides.sortable');
        Route::get('/slides/{slide}/deletar', [SlideController::class, 'destroy'])->name('slides.destroy');

        // Highlights //
        Route::get('/destaques', [HighlightController::class, 'index'])->name('destaques.index');
        Route::get('/destaques/{highlight}/criar', [HighlightController::class, 'create'])->name('destaques.create');
        Route::post('/destaques/{highlight}/criar', [HighlightController::class, 'store'])->name('destaques.store');
        Route::get('/destaques/{highlight}/deletar', [HighlightController::class, 'destroy'])->name('destaques.destroy');

        // Video //
        // Video CRUD 
        Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
        Route::get('/videos/criar', [VideoController::class, 'create'])->name('videos.create');
        Route::post('/videos/criar', [VideoController::class, 'store'])->name('videos.store');
        Route::get('/videos/{video}/show', [VideoController::class, 'show'])->name('videos.show');
        Route::get('/videos/{video}/editar', [VideoController::class, 'edit'])->name('videos.edit');
        Route::post('/videos/{video}/editar', [VideoController::class, 'update'])->name('videos.update');
        Route::get('/videos/{video}/deletar', [VideoController::class, 'destroy'])->name('videos.destroy');

        // Video Search
        Route::post('/videos/pesquisar', [VideoController::class, 'search'])->name('videos.search.ajax');
        Route::get('/videos/pesquisar/{search}', [VideoController::class, 'search'])->name('videos.search');

        // Video-Category Crud
        Route::get('/videos/categorias', [VideoController::class, 'categoriasIndex'])->name('videos.categorias.index');
        Route::get('/videos/categorias/criar', [VideoController::class, 'categoriasCreate'])->name('videos.categorias.create');
        Route::post('/videos/categorias/criar', [VideoController::class, 'categoriasStore'])->name('videos.categorias.store');
        Route::get('/videos/categorias/{category}/editar', [VideoController::class, 'categoriasEdit'])->name('videos.categorias.edit');
        Route::post('/videos/categorias/{category}/editar', [VideoController::class, 'categoriasUpdate'])->name('videos.categorias.update');
        Route::get('/videos/categorias/{category}/deletar', [VideoController::class, 'categoriasDestroy'])->name('videos.categorias.destroy');
    });
});


