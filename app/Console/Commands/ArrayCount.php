<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArrayCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'array:count {list}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count number of arrays in a nested list';

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
         $data = $this->argument('list');
        //$data = [1,2,[3,4,[5,6,[7],8,9],12],11];
        $sum = 1;
        //$this->nestedListCountOfArrayType($data,$sum);
        $this->nestedListCountOfStringType($data,$sum);
    }
     private function nestedListCountOfArrayType(array $data,&$sum)
    {
        foreach($data as $value)
        {
            if(is_array($value))
            {
                $sum++;
                $this->nestedListCountOfArrayType( $value,$sum);
            }
        }
    }
    private function nestedListCountOfStringType($data)
    {

        print(substr_count($data,"["));
    }
}
