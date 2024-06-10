<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SendNewUserNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $newUser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Log::info($this->newUser);
        // $id = $this->newUser->id;
        // Log::info($id);
        // $userFetch = User::whereNot('id', $id)->where('role','user')->get();
        // // $users = User::all();
        // foreach ($userFetch as $user) {

        //     Mail::to($user->email)->queue(new NewUserNotification($user));
        // }

        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->queue(new NewUserNotification($this->newUser));
        }
    }
}

