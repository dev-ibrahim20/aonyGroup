<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of media files.
     */
    public function index(Request $request)
    {
        $query = Media::query();

        // Filter by collection
        if ($request->has('collection')) {
            $query->where('collection', $request->collection);
        }

        // Filter by type
        if ($request->has('type')) {
            $query->where('mime_type', 'LIKE', $request->type . '%');
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('filename', 'LIKE', "%{$search}%")
                  ->orWhere('alt_text', 'LIKE', "%{$search}%");
            });
        }

        $media = $query->latest()->paginate(20);

        // Get collections for filter dropdown
        $collections = Media::distinct()->pluck('collection')->filter()->sort()->values();

        return view('admin.media.index', [
            'media' => $media,
            'collections' => $collections,
            'pageTitle' => 'Media Manager'
        ]);
    }

    /**
     * Upload media files.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240|mimes:jpeg,jpg,png,gif,svg,pdf,doc,docx',
            'collection' => 'required|string|max:50',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $uploadedFiles = [];

        foreach ($request->file('files') as $file) {
            // Store file
            $path = $file->store('media', 'public');

            // Create media record
            $media = Media::create([
                'filename' => $file->getClientOriginalName(),
                'original_filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'path' => $path,
                'url' => Storage::url($path),
                'collection' => $request->collection,
                'alt_text' => $request->alt_text,
                'order' => Media::where('collection', $request->collection)->max('order') + 1,
            ]);

            $uploadedFiles[] = [
                'id' => $media->id,
                'filename' => $media->filename,
                'url' => $media->url,
                'size' => $media->size_formatted,
            ];
        }

        return response()->json([
            'success' => true,
            'message' => count($uploadedFiles) . ' files uploaded successfully',
            'files' => $uploadedFiles,
        ]);
    }

    /**
     * Remove the specified media from storage.
     */
    public function destroy(Media $media)
    {
        // Delete file from storage
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        // Delete database record
        $media->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media deleted successfully!');
    }

    /**
     * Update media order.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'media' => 'required|array',
            'media.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->media as $mediaData) {
            Media::find($mediaData['id'])->update(['order' => $mediaData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Media order updated successfully',
        ]);
    }

    /**
     * Get media by collection.
     */
    public function getByCollection($collection)
    {
        $media = Media::where('collection', $collection)
            ->orderBy('order')
            ->get();

        return response()->json($media);
    }
}
