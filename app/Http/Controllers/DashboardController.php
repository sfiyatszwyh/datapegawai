<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data posisi pegawai dan hitung jumlah pegawai untuk setiap posisi
        $posisiCounts = DB::table('pegawais')
                            ->select('posisi', DB::raw('count(*) as total'))
                            ->groupBy('posisi')
                            ->get();

        // Ambil label posisi dan jumlahnya untuk digunakan dalam grafik
        $labels = $posisiCounts->pluck('posisi');
        $data = $posisiCounts->pluck('total');

        // Data untuk chart berdasarkan jenis kelamin dari tabel users
        $dataChart = [
            Pegawai::where('jenis_kelamin', 'Laki-laki')->count(),
            Pegawai::where('jenis_kelamin', 'Perempuan')->count()
        ];
        
        // Hitung jumlah admin
        $adminCount = User::where('role', 'admin')->count();

        return view('dashboard.index', compact('labels', 'data', 'dataChart', 'adminCount'));
    }
}
