<?php
namespace App\PipeLine\Action;
use App\Services\Production\FileService;
use LaravelRocket\Foundation\Services\ImageServiceInterface;

/**
 * Created by PhpStorm.
 * User: khanhhoang
 * Date: 4/19/19
 * Time: 11:34 AM
 */
class DataPipeLine implements \App\PipeLine\DataPipeLineInterface
{
    /**
     * @var ImageServiceInterface
     */
    private $imageService;

    /**
     * DataPipeLine constructor.
     * @param ImageServiceInterface $imageService
     */
    public function __construct(
        ImageServiceInterface $imageService
    )
    {
        $this->imageService = $imageService;
    }

    public function __invoke($payload){
        $this->imageService->annotateImage('123','134','đá');

        return $payload;
    }
}