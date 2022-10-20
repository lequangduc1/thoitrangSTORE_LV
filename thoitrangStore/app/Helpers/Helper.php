<?php

function getInformation($information_name)
{
    $information  = \App\Models\Information::all()->first();
    return $information[$information_name] ?? null;
}
