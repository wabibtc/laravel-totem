<?php

namespace Wabi\Totem\Events;

use Wabi\Totem\Task;
use Wabi\Totem\Notifications\TaskCompleted;

class Executed extends Event
{
    /**
     * Executed constructor.
     *
     * @param Task $task
     * @param string $started
     */
    public function __construct(Task $task, $started)
    {
        parent::__construct($task);

        $time_elapsed_secs = microtime(true) - $started;

        if (file_exists(storage_path($task->getMutexName()))) {
            $output = trim(file_get_contents(storage_path($task->getMutexName())));
            if (ends_with($output, "success@end")) {
                $task->fill(['last_status' => 1])->save();
            } else {
                $task->fill(['last_status' => 2])->save();
            }

            $task->results()->create([
                'duration'  => $time_elapsed_secs * 1000,
                'result'    => $output,
            ]);

            unlink(storage_path($task->getMutexName()));

            $task->notify(new TaskCompleted($output));
            $task->autoCleanup();
        }
    }
}
