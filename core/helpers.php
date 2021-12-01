<?php
function url($path): string
{
    return BASE_URL . $path;
}

function url_e($path)
{
    echo url($path);
}

function e(mixed $value)
{
    echo $value;
}
