<?php

namespace App\Listeners;

use App\Events\userActionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class userActionListener implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  userActionEvent  $event
     * @return void
     */
    public function handle(userActionEvent $event)
    {
        $log=new \App\Models\OperatorLog();
        $log->uid=$event->uid;
        $log->model=$event->model;
        $log->aid = $event->aid;
        $log->type= $event->type;
        $log->content = $event->content;
        $log->save();
    }
}
