<?php

namespace Wabi\Totem\Http\Controllers;

use Wabi\Totem\Contracts\TaskInterface;

class ExecuteTasksController extends Controller
{
    /**
     * @var TaskInterface
     */
    private $tasks;

    /**
     * @param TaskInterface $tasks
     */
    public function __construct(TaskInterface $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Execute a specific task.
     *
     * @param $task
     * @return \Illuminate\Http\Response
     */
    public function index($task)
    {
        $this->tasks->execute($task);

        return redirect()->back();
    }
}
