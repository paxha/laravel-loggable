<?php

namespace Loggable\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $user_id;
    public $description;
    public $before;
    public $after;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $description, $before, $after)
    {
        $this->user_id = $user_id;
        $this->description = $description;
        $this->before = $before;
        $this->after = $after;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
