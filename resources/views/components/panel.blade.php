@props(['title'])

<section class="bg-white rounded-xl shadow">
    <header class="px-4 py-3 border-b border-slate-200">
        <h2 class="font-semibold text-slate-700">{{ $title }}</h2>
    </header>
    <div class="p-4">
        {{ $slot }}
    </div>
</section>
