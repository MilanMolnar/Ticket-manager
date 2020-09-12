<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a master user for this application with the given arguments example: "make:admin admin" will create the master user with the name: admin, email: admin@developio.com and the password admin(hashed).';

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
        if ( 1 > User::all()->count() ){
            $admin = new User();
            $admin->name = $this->argument('user');
            $admin->email = $this->argument('user') . "@" . "developio.com";
            $admin->password = Hash::make( $this->argument('user'));
            $admin->save();
            echo "Info: Succesfully generated " . $this->argument('user') . " master user";
        }else{
            echo "Error: Master user already created!";
        }
    }
}
