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
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a master user for this application with the given prompt answers.';

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
     * The Console command will prompt for data and uses it to creat one master user.
     *
     * @return void
     */
    public function handle()
    {
        //If there are no master users
        if ( 1 > User::all()->count() ){
            $name = $this->ask('What should be your name?');
            $email = $this->ask('What should be your username? (your email will be "username@developio.com")') . "@" . "developio.com";
            $password = Hash::make($this->secret('What should be the password?'));
            $successMessage = "Succesfully created '" . $name . "' master user!";
            $confirmMessage = 'Are you sure you want to create ' . $name . ' master user?';
            if ($this->confirm($confirmMessage)) {
                $admin = new User();
                $admin->name = $name;
                $admin->email = $email;
                $admin->password = $password;
                $admin->save();
                $this->info($successMessage);
            }else{//Cancelled the operation
                $this->error('Creation cancelled!');
            }
        }else{//Master user already has been created
            $this->error('Maseter user already exists!');
        }
    }
}
