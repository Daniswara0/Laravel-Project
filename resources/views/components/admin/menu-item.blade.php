@props([
    'href' => '#',
    'label' => 'Menu',
    'icon' => null,
    'active' => null
])

@php
    $path = parse_url($href, PHP_URL_PATH) ?? $href;
    $cleanHref = trim($path, '/');

    // Memastikan pencocokan tepat pada URL tersebut atau sub-path di dalamnya (admin/about/*)
    $isActive = $active ?? (!empty($cleanHref) && $cleanHref !== '#' && (request()->is($cleanHref) || request()->is($cleanHref . '/*')));

    $dropdownId = 'dropdown-' . Str::slug($label);
    $hasSubmenu = isset($slot) && trim($slot) !== '';
@endphp

<li>
    @if($hasSubmenu)
        {{-- Mode Dropdown --}}
        <button type="button"
            class="flex items-center w-full p-2 text-base font-medium rounded-lg transition duration-75 group
                   {{ $isActive
                       ? 'bg-blue-100 text-blue-700 dark:bg-gray-700 dark:text-blue-400 font-semibold'
                       : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}"
            aria-controls="{{ $dropdownId }}"
            data-collapse-toggle="{{ $dropdownId }}">

            @if(isset($icon) && $icon != '')
                <span class="flex-shrink-0 w-6 h-6 transition duration-75 {{ $isActive ? 'text-blue-700 dark:text-blue-400' : 'text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' }}">
                    @if($icon instanceof \Illuminate\View\ComponentSlot)
                        {{ $icon }}
                    @else
                        {!! $icon !!}
                    @endif
                </span>
            @endif

            <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $label }}</span>

            <svg aria-hidden="true"
                 class="w-6 h-6 transition-transform duration-200 {{ $isActive ? 'rotate-180 text-blue-700 dark:text-blue-400' : 'text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' }}"
                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <ul id="{{ $dropdownId }}" class="{{ $isActive ? '' : 'hidden' }} py-2 space-y-2">
            {{ $slot }}
        </ul>
    @else
        {{-- Mode Link Biasa --}}
        <a href="{{ $href }}"
           class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 group
                  {{ $isActive
                      ? 'bg-blue-100 text-blue-700 dark:bg-gray-700 dark:text-blue-400 font-semibold'
                      : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">

            @if(isset($icon) && $icon != '')
                <span class="flex-shrink-0 w-6 h-6 transition duration-75 {{ $isActive ? 'text-blue-700 dark:text-blue-400' : 'text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' }}">
                    @if($icon instanceof \Illuminate\View\ComponentSlot)
                        {{ $icon }}
                    @else
                        {!! $icon !!}
                    @endif
                </span>
            @endif

            <span class="ml-3">{{ $label }}</span>
        </a>
    @endif
</li>
