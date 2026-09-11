<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateSiteImageRequest;
use App\Models\SiteImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SiteImageController extends Controller
{
    public function index(): View
    {
        return view('backend.images.index', [
            'pages' => config('site_images.pages'),
            'images' => SiteImage::query()->get()->keyBy('slot'),
        ]);
    }

    public function update(UpdateSiteImageRequest $request, string $slot): RedirectResponse
    {
        abort_unless(array_key_exists($slot, SiteImage::slots()), 404);

        $path = $this->storeImage($request->file('image'), $slot);
        $record = SiteImage::query()->firstOrNew(['slot' => $slot]);
        $previous = $record->path;

        $record->path = $path;
        $record->save();

        if ($previous && $previous !== $path) {
            Storage::disk('public')->delete($previous);
        }

        return back()->with('success', 'Image updated successfully.');
    }

    public function destroy(string $slot): RedirectResponse
    {
        abort_unless(array_key_exists($slot, SiteImage::slots()), 404);

        $record = SiteImage::query()->where('slot', $slot)->first();

        if ($record) {
            $record->deleteStoredFile();
            $record->delete();
        }

        return back()->with('success', 'Image deleted successfully.');
    }

    private function storeImage(UploadedFile $file, string $slot): string
    {
        return $file->store('site/'.Str::before($slot, '.'), 'public');
    }
}
