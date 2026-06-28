<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
   /**
    * Upload single image
    * POST /api/upload
    */
   public function upload(Request $request)
   {
      $request->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
      ]);

      $path = $request->file('image')->store('projects', 'public');

      return response()->json([
         'path' => $path,
         'url'  => Storage::url($path),
      ]);
   }

   /**
    * Delete image
    * DELETE /api/upload
    */
   public function delete(Request $request)
   {
      $request->validate(['path' => 'required|string']);

      if (Storage::disk('public')->exists($request->path)) {
         Storage::disk('public')->delete($request->path);
      }

      return response()->json(['message' => 'Deleted.']);
   }
}