<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    @switch($icon)
        @case('chart')<path d="M3 3v18h18M7 14l4-4 3 3 6-7M16 6h4v4"/>@break
        @case('buildings')<path d="M3 21h18M5 21V7l8-4v18M13 10h6v11M8 9h2m-2 4h2m-2 4h2m7-4h1m-1 4h1"/>@break
        @case('building')<rect x="4" y="3" width="16" height="18" rx="1"/><path d="M8 7h2m4 0h2M8 11h2m4 0h2M8 15h2m4 0h2M10 21v-3h4v3"/>@break
        @case('hotel')<path d="M3 21V7l9-4 9 4v14M3 11h18M7 11v10m10-10v10m-7-6h4m-4 3h4"/>@break
        @case('city')<path d="M3 21V9h6v12M9 21V4h7v17m0-9h5v9"/><path d="M5 12h2m-2 4h2m5-8h1m-1 4h1m-1 4h1m6-1h1m-1 3h1"/>@break
        @case('layers')<path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5m-18 4 9 5 9-5"/>@break
        @case('tools')<path d="M14.7 6.3a5 5 0 0 0-6.4 6.4L3 18l3 3 5.3-5.3a5 5 0 0 0 6.4-6.4L14 13l-3-3 3.7-3.7Z"/>@break
        @case('home')<path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-7h6v7"/>@break
        @case('key')<circle cx="8" cy="15" r="5"/><path d="m11.5 11.5 9-9 2 2-2 2 2 2-3 3-2-2-2 2"/>@break
        @case('mobile')<rect x="5" y="2" width="14" height="20" rx="2"/><path d="M9 18h6m-6-8 2 2 4-4"/>@break
        @case('target')<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/><path d="m13 11 7-7"/>@break
        @case('camera')<path d="M14 4h-4L8 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-4z"/><circle cx="12" cy="13" r="4"/>@break
        @case('ruler')<path d="M3 21 21 3l-2-2L1 19l2 2Z"/><path d="m14 4 3 3m-6 0 2 2m-5 1 2 2m-5 1 2 2"/>@break
        @case('bolt')<path d="m13 2-3 8h7L9 22l2-9H5l8-11Z"/>@break
        @case('drop')<path d="M12 3s7 7.2 7 12a7 7 0 0 1-14 0c0-4.8 7-12 7-12Z"/><path d="M9 16a3 3 0 0 0 3 3"/>@break
        @case('check')<circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/>@break
        @default<circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/>
    @endswitch
</svg>
