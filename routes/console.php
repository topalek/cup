<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('migration:fill',function (){

    $path = realpath('database/migrations');
    $applied = DB::table('migrations')->select('migration')->get();
    $applied = $applied->pluck('migration')->toArray();
    $migrations = scandir($path);
    array_shift($migrations);
    array_shift($migrations);
    $migrations = array_map(function ($item){
        return explode('.',$item)[0];
    },$migrations);

    $toApply = array_diff($migrations,$applied);

    if($toApply){
        $sql = [];
        foreach ($toApply as $migration){
            $sql[] = "insert into `migrations` (`migration`,`batch`) values ('$migration',1);";
        }
        if ($sql){
            DB::unprepared(implode("\n",$sql));
        }
    }

    dd('Done');
});
