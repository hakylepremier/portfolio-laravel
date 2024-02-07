<?php
use Illuminate\Support\Str;
?>

<div>
    Project Title {{ $project->title }}
    <p>
        {!! Str::markdown($project->content) !!}
    </p>
</div>
