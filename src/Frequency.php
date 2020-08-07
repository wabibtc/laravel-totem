<?php

namespace Wabi\Totem;

use Wabi\Totem\Traits\HasParameters;

class Frequency extends TotemModel
{
    use HasParameters;

    protected $table = 'task_frequencies';

    protected $fillable = [
        'label',
        'interval',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
