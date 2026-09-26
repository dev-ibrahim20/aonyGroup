<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePageSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicePageController extends Controller
{
    public function edit(string $section): View
    {
        $labels = ServicePageSetting::labels();
        abort_unless(isset($labels[$section]), 404);

        return view('admin.service-page', [
            'section' => $section,
            'sectionLabel' => $labels[$section],
            'sectionLabels' => $labels,
            'content' => ServicePageSetting::content($section),
            'defaults' => ServicePageSetting::defaults($section),
            'iconOptions' => [
                'buildings' => 'مبانٍ',
                'building' => 'مبنى',
                'hotel' => 'فندق',
                'city' => 'مدينة',
                'layers' => 'طبقات',
                'tools' => 'أدوات',
                'home' => 'منزل',
                'key' => 'مفتاح',
                'mobile' => 'هاتف',
                'target' => 'استهداف',
                'camera' => 'كاميرا',
                'chart' => 'رسم بياني',
                'ruler' => 'مسطرة',
                'bolt' => 'كهرباء',
                'drop' => 'مياه',
                'check' => 'اعتماد',
            ],
        ]);
    }

    public function update(Request $request, string $section): RedirectResponse
    {
        $labels = ServicePageSetting::labels();
        abort_unless(isset($labels[$section]), 404);

        $defaults = ServicePageSetting::defaults($section);
        $iconKeys = 'buildings,building,hotel,city,layers,tools,home,key,mobile,target,camera,chart,ruler,bolt,drop,check';
        $rules = [
            'title' => ['required', 'string', 'max:150'],
            'hero_images' => ['nullable', 'array', 'max:' . count($defaults['hero_images'])],
            'vision' => ['required', 'string', 'max:2000'],
            'mission' => ['required', 'string', 'max:2000'],
            'values' => ['required', 'string', 'max:2000'],
            'services_heading' => ['required', 'string', 'max:150'],
            'cta_text' => ['required', 'string', 'max:300'],
            'cta_button' => ['required', 'string', 'max:100'],
            'services' => ['required', 'array', 'size:' . count($defaults['services'])],
            'projects_title' => ['required', 'string', 'max:150'],
            'projects' => ['required', 'array', 'size:' . count($defaults['projects'])],
        ];

        foreach ($defaults['hero_images'] as $index => $_image) {
            $rules["hero_images.$index"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }
        foreach ($defaults['services'] as $index => $_service) {
            $rules["services.$index.title"] = ['required', 'string', 'max:150'];
            $rules["services.$index.description"] = ['required', 'string', 'max:600'];
            $rules["services.$index.icon"] = ['required', 'string', 'in:' . $iconKeys];
        }
        foreach ($defaults['projects'] as $index => $_project) {
            $rules["projects.$index.title"] = ['required', 'string', 'max:150'];
            $rules["projects.$index.description"] = ['required', 'string', 'max:1000'];
            $rules["projects.$index.alt"] = ['required', 'string', 'max:200'];
            $rules["projects.$index.badge1"] = ['required', 'string', 'max:80'];
            $rules["projects.$index.badge2"] = ['required', 'string', 'max:80'];
            $rules["projects.$index.image_upload"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }
        $validated = $request->validate($rules);
        $content = ServicePageSetting::rawContent($section);

        foreach (['title', 'vision', 'mission', 'values', 'services_heading', 'cta_text', 'cta_button', 'projects_title'] as $key) {
            $content[$key] = $validated[$key];
        }

        foreach ($content['hero_images'] as $index => $image) {
            if ($request->hasFile("hero_images.$index")) {
                $content['hero_images'][$index] = $request->file("hero_images.$index")->store("service-pages/$section/hero", 'public');
            }
        }

        foreach ($content['services'] as $index => $service) {
            foreach (['title', 'description', 'icon'] as $key) {
                $content['services'][$index][$key] = $validated['services'][$index][$key];
            }
        }

        foreach ($content['projects'] as $index => $project) {
            foreach (['title', 'description', 'alt', 'badge1', 'badge2'] as $key) {
                $content['projects'][$index][$key] = $validated['projects'][$index][$key];
            }
            if ($request->hasFile("projects.$index.image_upload")) {
                $content['projects'][$index]['image'] = $request->file("projects.$index.image_upload")->store("service-pages/$section/projects", 'public');
            }
        }

        ServicePageSetting::saveContent($section, $content);

        return redirect()->route('admin.service-pages.edit', $section)->with('status', 'تم حفظ تفاصيل القسم بنجاح.');
    }
}
