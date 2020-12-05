<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StringReplace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'string:replace';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace strings';

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
     * @return void
     */
    public function handle()
    {
        $pattern = $this->ask('Insert your pattern:');
        $phrase = $this->ask('Insert your phrase:');
        $ar = explode(" ",$phrase);
        foreach($ar as $key=>$value)
        {
            $delimiter = '@\{'.$key.'\}@';
            $pattern = preg_replace($delimiter, $value, $pattern);

        }
        print($pattern);
    }
}
