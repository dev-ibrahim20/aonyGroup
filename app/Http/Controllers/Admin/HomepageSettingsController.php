<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomepageSettingsController extends Controller
{
    public function edit(): View
    {
        return view('admin.homepage-settings', [
            'homepage' => SiteSetting::homepage(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:150'],
            'vision' => ['required', 'string', 'max:2000'],
            'mission' => ['required', 'string', 'max:2000'],
            'values' => ['required', 'string', 'max:2000'],
            'logo_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'hero_images' => ['nullable', 'array', 'max:5'],
            'hero_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'sections' => ['required', 'array', 'size:5'],
            'sections.*.name' => ['required', 'string', 'max:120'],
            'sections.*.description' => ['required', 'string', 'max:500'],
            'sections.*.image_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'contact.address' => ['required', 'string', 'max:255'],
            'contact.phone' => ['required', 'string', 'max:40'],
            'contact.mobile' => ['nullable', 'string', 'max:40'],
            'contact.email' => ['required', 'email', 'max:150'],
            'contact.hours' => ['nullable', 'string', 'max:150'],
        ]);

        $homepage = SiteSetting::rawHomepage();
        $homepage['company_name'] = $validated['company_name'];
        $homepage['vision'] = $validated['vision'];
        $homepage['mission'] = $validated['mission'];
        $homepage['values'] = $validated['values'];
        $homepage['contact'] = array_replace($homepage['contact'], $validated['contact']);

        if ($request->hasFile('logo_upload')) {
            $homepage['logo'] = $request->file('logo_upload')->store('homepage', 'public');
        }

        foreach (range(0, 4) as $index) {
            if ($request->hasFile("hero_images.$index")) {
                $homepage['hero_images'][$index] = $request->file("hero_images.$index")->store('homepage/hero', 'public');
            }

            $homepage['sections'][$index]['name'] = $validated['sections'][$index]['name'];
            $homepage['sections'][$index]['description'] = $validated['sections'][$index]['description'];

            if ($request->hasFile("sections.$index.image_upload")) {
                $homepage['sections'][$index]['image'] = $request->file("sections.$index.image_upload")->store('homepage/sections', 'public');
            }
        }

        SiteSetting::saveHomepage($homepage);

        return redirect()->route('admin.homepage.edit')->with('status', 'تم حفظ إعدادات الصفحة الرئيسية بنجاح.');
    }
}
