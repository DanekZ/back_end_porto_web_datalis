<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UploadController;

// ── Public Routes ─────────────────────────────────────────────────────────────
Route::post('/login', [AuthController::class, 'login']);

Route::get('/projects',        [ProjectController::class, 'index']);
Route::get('/projects/{id}',   [ProjectController::class, 'show']);
Route::get('/skills',          [SkillController::class, 'index']);
Route::get('/experiences',     [ExperienceController::class, 'index']);
Route::get('/achievements',    [AchievementController::class, 'index']);
Route::get('/educations',      [EducationController::class, 'index']);
Route::get('/settings',        [SettingController::class, 'index']);

// ── Protected Routes (Admin only) ─────────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {

   Route::post('/logout', [AuthController::class, 'logout']);
   Route::get('/me',      [AuthController::class, 'me']);

   // Projects
   Route::post('/projects',           [ProjectController::class, 'store']);
   Route::put('/projects/{id}',       [ProjectController::class, 'update']);
   Route::delete('/projects/{id}',    [ProjectController::class, 'destroy']);

   // Skills
   Route::post('/skills',             [SkillController::class, 'store']);
   Route::put('/skills/{id}',         [SkillController::class, 'update']);
   Route::delete('/skills/{id}',      [SkillController::class, 'destroy']);

   // Experiences
   Route::post('/experiences',        [ExperienceController::class, 'store']);
   Route::put('/experiences/{id}',    [ExperienceController::class, 'update']);
   Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy']);

   // Achievements
   Route::post('/achievements',        [AchievementController::class, 'store']);
   Route::put('/achievements/{id}',    [AchievementController::class, 'update']);
   Route::delete('/achievements/{id}', [AchievementController::class, 'destroy']);

   // Educations
   Route::post('/educations',          [EducationController::class, 'store']);
   Route::put('/educations/{id}',      [EducationController::class, 'update']);
   Route::delete('/educations/{id}',   [EducationController::class, 'destroy']);

   // upload project image
   Route::post('/upload',   [UploadController::class, 'upload']);
   Route::delete('/upload', [UploadController::class, 'delete']);

   // Settings (resume_url, dll)
   Route::put('/settings',             [SettingController::class, 'update']);
});