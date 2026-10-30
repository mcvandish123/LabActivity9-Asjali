<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Asjali';
        $schedules = Vaccination::orderBy('scheduled_at')->get();
        $stats = [
            ['label' => 'Total', 'value' => $schedules->count()],
            ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue', 'value' => $schedules->where('status', 'Overdue')->count()],
        ];
        $alerts = $schedules->where('status', 'Overdue');
        $outOfStock = ['MMR'];
        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts', 'outOfStock'));
    }

    public function schedule()
    {
        $title = 'Vaccination Schedule – Purok Asjali';
        $schedules = Vaccination::orderBy('scheduled_at')->get();
        return view('dashboard.schedule', compact('title', 'schedules'));
    }
}
