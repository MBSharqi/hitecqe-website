<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateSiteImageRequest;
use App\Models\SiteImage;
use Illuminate\Http\RedirectResponse;
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
        abort_unless(array_key_exists($slot, site_image_slots()), 404);

        $record = SiteImage::query()->firstOrNew(['slot' => $slot]);
        $record->deleteStoredFile();
        $record->path = $request->file('image')->store('site/'.strtok($slot, '.'), 'public');
        $record->save();

        return back()->with('success', 'Image updated successfully.');
    }

    public function destroy(string $slot): RedirectResponse
    {
        abort_unless(array_key_exists($slot, site_image_slots()), 404);

        $record = SiteImage::query()->where('slot', $slot)->first();

        if ($record) {
            $record->deleteStoredFile();
            $record->delete();
        }

        return back()->with('success', 'Image removed. The placeholder will show until you upload a new one.');
    }
}
