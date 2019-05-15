<?php

namespace App\Helpers\Production;

use App\Helpers\StringHelperInterface;
use League\Pipeline\Pipeline;

class StringHelper extends \LaravelRocket\Foundation\Helpers\Production\StringHelper implements StringHelperInterface
{

    public function cutStringWithWidth($input, $draw, $im)
    {
        $textInfo  = $im->queryFontMetrics($draw, $input['text']);
        if(isset($input['width']) && $input['width'] <  $textInfo['textWidth']){
            $input['text'] = substr(trim($input['text']), 0, -1);
            $input = $this->cutStringWithWidth($input, $draw, $im);
        }

        return $input;
    }
}

