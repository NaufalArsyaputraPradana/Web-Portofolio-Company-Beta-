<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<!-- resources/views/components/logo-wall.blade.php -->
@php
    // Default logo bank dan perusahaan Indonesia
    $items = $items ?? [
        [
            'imgUrl' => 'https://www.bca.co.id/Assets/Images/logo-bca.png',
            'altText' => 'Bank Central Asia',
        ],
        [
            'imgUrl' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_mandiri_logo.png',
            'altText' => 'Bank Mandiri',
        ],
        [
            'imgUrl' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/Logo_Bank_BRI.png',
            'altText' => 'Bank Rakyat Indonesia',
        ],
        [
            'imgUrl' => 'https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_Bank_BNI.png',
            'altText' => 'Bank Negara Indonesia',
        ],
        [
            'imgUrl' => 'https://upload.wikimedia.org/wikipedia/commons/8/82/Telkom_Indonesia_logo.png',
            'altText' => 'Telkom Indonesia',
        ],
        [
            'imgUrl' => 'https://upload.wikimedia.org/wikipedia/commons/8/8d/Pertamina_logo.png',
            'altText' => 'Pertamina',
        ],
    ];
    $direction = $direction ?? 'horizontal';
    $size = $size ?? 'clamp(8rem, 1rem + 30vmin, 25rem)';
    $duration = $duration ?? '60s';
    $textColor = $textColor ?? '#ffffff';
    $bgColor = $bgColor ?? '#f4f4f4';
    $bgAccentColor = $bgAccentColor ?? '#e0e0e0';
@endphp

<style>
    /* Keyframe Animations */
    @keyframes scrollX {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes scrollY {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-100%);
        }
    }

    /* Mask Utilities */
    .mask-horizontal {
        mask-image: linear-gradient(to right,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 1) 20%,
                rgba(0, 0, 0, 1) 80%,
                rgba(0, 0, 0, 0) 100%);
        mask-size: cover;
        mask-repeat: no-repeat;
    }

    .mask-vertical {
        mask-image: linear-gradient(to bottom,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 1) 20%,
                rgba(0, 0, 0, 1) 80%,
                rgba(0, 0, 0, 0) 100%);
        mask-size: cover;
        mask-repeat: no-repeat;
    }

    /* Animation Classes */
    .animate-scrollX {
        animation: scrollX var(--duration) linear infinite;
    }

    .animate-scrollY {
        animation: scrollY var(--duration) linear infinite;
    }

    .reverse-x {
        animation-direction: reverse;
        animation-delay: -3s;
    }

    .reverse-y {
        animation-direction: reverse;
        animation-delay: -3s;
    }
</style>

<article
    class="{{ $direction == 'vertical' ? 'flex-row justify-center h-full' : 'flex-col' }} flex gap-4 mx-auto max-w-full p-5"
    style="
        --size: {{ $size }};
        --duration: {{ $duration }};
        --color-text: {{ $textColor }};
        --color-bg: {{ $bgColor }};
        --color-bg-accent: {{ $bgAccentColor }};
        color: var(--color-text);
        background-color: var(--color-bg);
    ">
    {{-- First Marquee Direction --}}
    <div
        class="relative flex overflow-hidden select-none gap-4
        {{ $direction == 'vertical' ? 'flex-col h-full mask-vertical' : 'w-full mask-horizontal' }}">

        <div
            class="flex-shrink-0 flex items-center justify-around gap-4
            {{ $direction == 'vertical' ? 'flex-col min-h-full animate-scrollY' : 'min-w-full animate-scrollX' }}">
            @foreach ($items as $item)
                <img src="{{ $item['imgUrl'] }}" alt="{{ $item['altText'] }}"
                    class="bg-[var(--color-bg-accent)] rounded-md object-contain grayscale hover:grayscale-0 transition-all duration-300
                    {{ $direction == 'vertical'
                        ? 'aspect-square w-[calc(var(--size)/1.5)] p-[calc(var(--size)/6)]'
                        : 'aspect-video w-[var(--size)] p-[calc(var(--size)/10)]' }}" />
            @endforeach
        </div>

        {{-- Duplicate for seamless scrolling --}}
        <div aria-hidden="true"
            class="flex-shrink-0 flex items-center justify-around gap-4
            {{ $direction == 'vertical' ? 'flex-col min-h-full animate-scrollY' : 'min-w-full animate-scrollX' }}">
            @foreach ($items as $item)
                <img src="{{ $item['imgUrl'] }}" alt="{{ $item['altText'] }}"
                    class="bg-[var(--color-bg-accent)] rounded-md object-contain grayscale hover:grayscale-0 transition-all duration-300
                    {{ $direction == 'vertical'
                        ? 'aspect-square w-[calc(var(--size)/1.5)] p-[calc(var(--size)/6)]'
                        : 'aspect-video w-[var(--size)] p-[calc(var(--size)/10)]' }}" />
            @endforeach
        </div>
    </div>

    {{-- Reverse Direction Marquee --}}
    <div
        class="relative flex overflow-hidden select-none gap-4 marquee--reverse
        {{ $direction == 'vertical' ? 'flex-col h-full mask-vertical' : 'w-full mask-horizontal' }}">

        <div
            class="flex-shrink-0 flex items-center justify-around gap-4
            {{ $direction == 'vertical' ? 'flex-col min-h-full animate-scrollY reverse-y' : 'min-w-full animate-scrollX reverse-x' }}">
            @foreach ($items as $item)
                <img src="{{ $item['imgUrl'] }}" alt="{{ $item['altText'] }}"
                    class="bg-[var(--color-bg-accent)] rounded-md object-contain grayscale hover:grayscale-0 transition-all duration-300
                    {{ $direction == 'vertical'
                        ? 'aspect-square w-[calc(var(--size)/1.5)] p-[calc(var(--size)/6)]'
                        : 'aspect-video w-[var(--size)] p-[calc(var(--size)/10)]' }}" />
            @endforeach
        </div>

        {{-- Duplicate for seamless scrolling --}}
        <div aria-hidden="true"
            class="flex-shrink-0 flex items-center justify-around gap-4
            {{ $direction == 'vertical' ? 'flex-col min-h-full animate-scrollY reverse-y' : 'min-w-full animate-scrollX reverse-x' }}">
            @foreach ($items as $item)
                <img src="{{ $item['imgUrl'] }}" alt="{{ $item['altText'] }}"
                    class="bg-[var(--color-bg-accent)] rounded-md object-contain grayscale hover:grayscale-0 transition-all duration-300
                    {{ $direction == 'vertical'
                        ? 'aspect-square w-[calc(var(--size)/1.5)] p-[calc(var(--size)/6)]'
                        : 'aspect-video w-[var(--size)] p-[calc(var(--size)/10)]' }}" />
            @endforeach
        </div>
    </div>
</article>
