<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FlushSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sessions:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all active sessions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        session()->flush();
        $this->info('All active sessions have been flushed.');
    }
}