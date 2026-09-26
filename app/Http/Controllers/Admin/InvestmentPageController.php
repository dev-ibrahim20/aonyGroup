<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvestmentPageSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvestmentPageController extends Controller
{
    public function edit(): View
    {
        return view('admin.investment-page', [
            'content' => InvestmentPageSetting::currentContent(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $defaults = InvestmentPageSetting::defaults();
        $rules = [
            'services_heading' => ['required', 'string', 'max:150'],
            'areas_heading' => ['required', 'string', 'max:150'],
            'hero_images' => ['nullable', 'array', 'max:' . count($defaults['hero_images'])],
            'services' => ['required', 'array', 'size:' . count($defaults['services'])],
            'investment_areas' => ['required', 'array', 'size:' . count($defaults['investment_areas'])],
        ];

        foreach ($defaults['hero_images'] as $index => $_image) {
            $rules["hero_images.$index"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }
        foreach ($defaults['services'] as $index => $_service) {
            $rules["services.$index.title"] = ['required', 'string', 'max:150'];
            $rules["services.$index.description"] = ['required', 'string', 'max:600'];
        }
        foreach ($defaults['investment_areas'] as $index => $_area) {
            $rules["investment_areas.$index.title"] = ['required', 'string', 'max:150'];
            $rules["investment_areas.$index.description"] = ['required', 'string', 'max:1000'];
            $rules["investment_areas.$index.alt"] = ['required', 'string', 'max:200'];
            $rules["investment_areas.$index.badge1"] = ['required', 'string', 'max:80'];
            $rules["investment_areas.$index.badge2"] = ['required', 'string', 'max:80'];
            $rules["investment_areas.$index.image_upload"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }

        $validated = $request->validate($rules);
        $content = InvestmentPageSetting::rawContent();
        $content['services_heading'] = $validated['services_heading'];
        $content['areas_heading'] = $validated['areas_heading'];

        foreach ($content['hero_images'] as $index => $image) {
            if ($request->hasFile("hero_images.$index")) {
                $content['hero_images'][$index] = $request->file("hero_images.$index")->store('investment/hero', 'public');
            }
        }

        foreach ($content['services'] as $index => $service) {
            $content['services'][$index]['title'] = $validated['services'][$index]['title'];
            $content['services'][$index]['description'] = $validated['services'][$index]['description'];
        }

        foreach ($content['investment_areas'] as $index => $area) {
            foreach (['title', 'description', 'alt', 'badge1', 'badge2'] as $field) {
                $content['investment_areas'][$index][$field] = $validated['investment_areas'][$index][$field];
            }

            if ($request->hasFile("investment_areas.$index.image_upload")) {
                $content['investment_areas'][$index]['image'] = $request->file("investment_areas.$index.image_upload")->store('investment/areas', 'public');
            }
        }

        InvestmentPageSetting::saveContent($content);

        return redirect()->route('admin.investment.edit')->with('status', 'تم حفظ محتوى صفحة الاستثمار العقاري بنجاح.');
    }
}
