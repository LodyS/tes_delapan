<?php

namespace App\Jobs;
use App\KasbonApi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetujuMasalKasbon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rekues;

    public function __construct($rekues)
    {
        $this->rekues = $rekues;
    }

    public function handle()
    {
        KasbonApi::where('tanggal_diajukan', $this->rekues['tanggal_diajukan'])->update(['tanggal_disetujui'=>date('Y-m-d')]);
    }
}
