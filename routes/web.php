<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/projects/{project}', [PortfolioController::class, 'projectDetail'])->name('projects.detail');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');