<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total layanan
        $totalLayanan = Layanan::count();

        // Layanan per jenis
        $layananPerJenis = JenisLayanan::withCount('layanans')->get();

        // Data 3 bulan terakhir
        $threeMonthsAgo = Carbon::now()->subMonths(3);

        // Data untuk chart - layanan per bulan per jenis (3 bulan terakhir)
        $chartData = JenisLayanan::with(['layanans' => function($query) use ($threeMonthsAgo) {
            $query->where('created_at', '>=', $threeMonthsAgo)
                  ->select('id_layanan', DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total'))
                  ->groupBy('id_layanan', 'month', 'year');
        }])->get();

        // Format data untuk 3 bulan terakhir
        $months = [];
        $monthLabels = [];
        for ($i = 2; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = [
                'month' => $date->month,
                'year' => $date->year,
                'label' => $date->format('M Y')
            ];
            $monthLabels[] = $date->format('M Y');
        }

        // Prepare series data untuk chart
        $seriesData = [];
        foreach ($layananPerJenis as $jenis) {
            $data = [];
            foreach ($months as $monthInfo) {
                $count = Layanan::where('id_layanan', $jenis->id)
                    ->whereMonth('created_at', $monthInfo['month'])
                    ->whereYear('created_at', $monthInfo['year'])
                    ->count();
                $data[] = $count;
            }
            $seriesData[] = [
                'name' => $jenis->nama_layanan,
                'data' => $data
            ];
        }

        return view('dashboard', compact('totalLayanan', 'layananPerJenis', 'seriesData', 'monthLabels'));
    }
}
