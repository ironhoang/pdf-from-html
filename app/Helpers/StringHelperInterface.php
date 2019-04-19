<?php

namespace App\Helpers;

interface StringHelperInterface extends \LaravelRocket\Foundation\Helpers\StringHelperInterface
{

    public function cutStringWithWidth($input, $draw, $im);
}

