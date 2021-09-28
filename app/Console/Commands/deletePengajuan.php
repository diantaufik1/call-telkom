<?php

namespace App\Console\Commands;

use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class deletePengajuan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:pengajuan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menghapus data Pengajuan otomatis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hari = -1;
        $dt = Carbon::now();
        $dates = $dt->addDay($hari)->toDateString();
        $date = Pengajuan::where('hapus', $dates)->get();
        foreach ($date as $tanggal) {
            Pengajuan::find($tanggal->id)->delete();
        }
        Log::info('Data Berhasil di hapus');
    }
}
