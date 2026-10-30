@extends('layouts.app')

@section('title', $title)

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

<x-panel title="All vaccination schedules">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-100 text-slate-600">
                <tr>
                    <th class="p-2">#</th>
                    <th class="p-2">Patient</th>
                    <th class="p-2 hidden md:table-cell">Purok</th>
                    <th class="p-2">Vaccine</th>
                    <th class="p-2 hidden md:table-cell">Dose</th>
                    <th class="p-2">Date</th>
                    <th class="p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schedules as $row)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-slate-50' }}">
                        <td class="p-2 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="p-2 font-medium">{{ $row->patient_name }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $row->purok }}</td>
                        <td class="p-2">{{ $row->vaccine }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $row->dose }}</td>
                        <td class="p-2 whitespace-nowrap">{{ $row->scheduled_at->format('M d, Y') }}</td>
                        <td class="p-2">
                            @if ($row->status === 'Done')
                                <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700">Done</span>
                            @elseif ($row->status === 'Scheduled')
                                <span class="px-2 py-0.5 rounded-full bg-sky-100 text-sky-700">Scheduled</span>
                            @endif
                            @unless ($row->status !== 'Overdue')
                                <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-700">Overdue</span>
                            @endunless
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-slate-500">No schedules yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-panel>
@endsection
