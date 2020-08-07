<?php

namespace Wabi\Totem\Events;

use Wabi\Totem\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class Updating extends Event
{
    /**
     * @var array
     */
    private $input;

    /**
     * Create a new event instance.
     *
     * @param array $input
     * @param Task $task
     */
    public function __construct(array $input, Task $task)
    {
        $this->input = $input;
        parent::__construct($task);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
