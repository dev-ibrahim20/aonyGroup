<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialLinksController extends Controller
{
    public function edit(): View
    {
        return view('admin.social-links', [
            'links' => SiteSetting::socialLinks(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'facebook' => ['nullable', 'url', 'max:255'],
            'whatsapp' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'x' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
        ]);

        SiteSetting::saveSocialLinks($validated);

        return redirect()->route('admin.social-links.edit')->with('status', 'تم حفظ روابط التواصل الاجتماعي.');
    }
}
