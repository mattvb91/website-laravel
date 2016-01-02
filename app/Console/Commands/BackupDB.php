<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BackupDB extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:backup-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a zip of the sqlite database and emails it.';

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
     * @return mixed
     */
    public function handle()
    {
        //Zip the database.
        $path = storage_path() . '/database.sqlite';
        $zip = new \ZipArchive();
        $zipPath = storage_path() . '/backup.zip';

        $zip->open($zipPath, \ZipArchive::CREATE);
        $zip->addFile($path);
        $zip->close();

        //Send email.
        $user = User::first();
        if(Mail::send(['email' => 'db'], [], function ($mail) use ($user, $zipPath)
        {
            $mail->from(env('MAIL_ADDRESS'), 'Mavon.ie System');
            $mail->to($user->getEmail())->subject('Mavon.ie DB Backup ' . Carbon::now());
            $mail->attach($zipPath);
        })){
            echo "Backup sent!" . PHP_EOL;
        };

        //Delete zip when finished.
        unlink($zipPath);
    }
}
