<?php
namespace App\PipeLine;
/**
 * Created by PhpStorm.
 * User: khanhhoang
 * Date: 4/19/19
 * Time: 11:34 AM
 */
interface DataPipeLineInterface extends \League\Pipeline\StageInterface
{

    public function __invoke($payload);
}