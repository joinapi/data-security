<?php

namespace Commands;

use Illuminate\Console\Command;

class DataSecurityCommand extends Command
{
    public $signature = 'data-security';

    public $description = 'DataSecurityCommand command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
