<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArraySum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'array:sum {list} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the sum of a given array';

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
        //$data = [1,2,[3,4,[5,6,[7],8,9],12],11];
        $data = $this->argument('list');
        $sum = 0;
        //$this->nestedListSumOfArrayType($data,$sum);

        $this->nestedListSumOfStringType($data);
    }
    private function nestedListSumOfArrayType(array $data,&$sum)
    {
        foreach($data as $value)
        {
            if(is_array($value)){
                    $this->nestedListSumOfArrayType( $value,$sum);
            }else{
               $sum += is_int($value)?$value:0;
            }
        }
    }
    private function nestedListSumOfStringType($data)
    {
        $delimiters = array("[","]");
        $data = str_replace($delimiters,"",$data);

        $sum = array_sum(explode(",",$data));
        print($sum);
    }
}
