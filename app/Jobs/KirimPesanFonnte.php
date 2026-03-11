<?php

namespace App\Jobs;

use App\services\fonnteservice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class KirimPesanFonnte implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public $phone, public $pesan) {}

public function handle(): void
{
    fonnteservice::sendText($this->phone, $this->pesan);
    sleep(2); // jeda antar pengiriman
}

}
