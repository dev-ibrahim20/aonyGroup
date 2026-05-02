@extends('layouts.app')

@section('head')
    {{-- Dynamic SEO meta tags for project --}}
    <x-seo-meta :model="$project" />
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <nav class="text-sm mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Home</a></li>
                <li class="text-gray-500">/</li>
                <li><a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800">Projects</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-900">{{ $project->title }}</li>
            </ol>
        </nav>

        <!-- Project Header -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="relative h-96 bg-gray-200">
                @if($project->display_image)
                    <img src="{{ $project->display_image->full_url }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover">
                @endif
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 text-white">
                    <h1 class="text-4xl font-bold mb-2">{{ $project->title }}</h1>
                    <p class="text-xl mb-4">{{ $project->location }}</p>
                    <div class="flex items-center space-x-4">
                        @if($project->isAvailable())
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Available</span>
                        @elseif($project->isSoldOut())
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Sold Out</span>
                        @else
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Coming Soon</span>
                        @endif
                        
                        @if($project->featured)
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Featured</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4">Description</h2>
                    <div class="prose max-w-none">
                        {!! $project->description !!}
                    </div>
                </div>

                <!-- Units Gallery -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Available Units</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($project->units->available()->take(6) as $unit)
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                @if($unit->display_image)
                                    <img src="{{ $unit->display_image->full_url }}" 
                                         alt="{{ $unit->title }}" 
                                         class="w-full h-48 object-cover rounded mb-4">
                                @endif
                                <h3 class="font-bold text-lg mb-2">{{ $unit->title }}</h3>
                                <p class="text-gray-600 mb-2">{{ $unit->bedrooms }} BR / {{ $unit->bathrooms }} BA / {{ $unit->area }} m²</p>
                                <p class="text-2xl font-bold text-blue-600">${{ number_format($unit->price, 2) }}</p>
                                <a href="{{ $unit->url }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    View Details
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Project Information -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <h3 class="text-xl font-bold mb-4">Project Information</h3>
                    <dl class="space-y-2">
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Location:</dt>
                            <dd class="font-semibold">{{ $project->location }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Status:</dt>
                            <dd class="font-semibold">{{ ucfirst($project->status) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Total Units:</dt>
                            <dd class="font-semibold">{{ $project->units->count() }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Available:</dt>
                            <dd class="font-semibold">{{ $project->units->available()->count() }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Price Range:</dt>
                            <dd class="font-semibold">
                                ${{ number_format($project->units->min('price'), 2) }} - 
                                ${{ number_format($project->units->max('price'), 2) }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Request Information</h3>
                    <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" name="phone" required class="w-full border rounded-lg px-3 py-2">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full border rounded-lg px-3 py-2">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea name="message" rows="4" class="w-full border rounded-lg px-3 py-2"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                            Send Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
