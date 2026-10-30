@extends('layouts.app')

@section('title', $title)

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

<div class="grid gap-4 md:grid-cols-4 mb-6">
    @foreach ($stats as $stat)
        <x-stat-card :title="$stat['label']" :value="$stat['value']" />
    @endforeach
</div>

@if ($alerts->count() > 0)
    <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 p-4">
        ⚠️ {{ $alerts->count() }} overdue vaccination(s) need follow-up.
    </div>
@elseif (count($outOfStock) > 0)
    <div class="mb-6 rounded-lg bg-amber-100 border border-amber-300 text-amber-800 p-4">
        📦 Out of stock: {{ implode(', ', $outOfStock) }}. Reschedule affected patients.
    </div>
@else
    <div class="mb-6 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 p-4">
        ✅ All clear. No overdue vaccinations.
    </div>
@endif

<x-panel title="Overdue alerts">
    @forelse ($alerts as $alert)
        <div class="flex flex-col sm:flex-row sm:justify-between py-2 {{ $loop->last ? '' : 'border-b border-slate-100' }}">
            <span class="font-medium">{{ $alert->patient_name }} <span class="text-slate-500">({{ $alert->purok }})</span></span>
            <span class="text-sm text-slate-600">{{ $alert->vaccine }} · {{ $alert->dose }} · {{ $alert->scheduled_at->format('M d, Y') }}</span>
        </div>
    @empty
        <p class="text-slate-500">No overdue patients.</p>
    @endforelse
</x-panel>
@endsection
