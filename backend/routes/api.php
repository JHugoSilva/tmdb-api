<?php

use App\Http\Controllers\FavoriteMovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/search', [MovieController::class, 'searchTitle']);
// Route::get('/movies/{id}', [MovieController::class, 'getDetails'])->name('movies.show');

Route::get('/favorites', [FavoriteMovieController::class, 'index']);
Route::get('/favorites/genres', [FavoriteMovieController::class, 'getGenres']);
Route::post('/favorites', [FavoriteMovieController::class, 'store']);
Route::delete('/favorites/{tmdb_id}', [FavoriteMovieController::class, 'destroy']);

