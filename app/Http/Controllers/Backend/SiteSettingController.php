<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateSiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('backend.settings.edit', [
            'settings' => SiteSetting::current()->resolved(),
        ]);
    }

    public function update(UpdateSiteSettingRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['phone_link']) && ! empty($data['phone'])) {
            $data['phone_link'] = preg_replace('/[^\d+]/', '', $data['phone']);
        }

        SiteSetting::current()->update($data);

        return back()->with('success', 'Site settings saved successfully.');
    }
}
