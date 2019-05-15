<?php

namespace App\Console\Commands;

use App\PipeLine\Action\DataPipeLine;
use App\PipeLine\DataPipeLineInterface;
use Illuminate\Console\Command;
use LaravelRocket\Foundation\Services\ImageServiceInterface;
use League\Pipeline\Pipeline;
use PDF;

class MakePDF  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dompdf:make_pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make pdf use dompdf with template';
    /**
     * @var ImageServiceInterface
     */
    private $imageService;
    /**
     * @var DataPipeLineInterface
     */
    private $dataPipeLine;

    /**
     * Create a new command instance.
     *
     * @param ImageServiceInterface $imageService
     * @param DataPipeLineInterface $dataPipeLine
     */
    public function __construct(
        ImageServiceInterface $imageService,
        DataPipeLineInterface $dataPipeLine
    )
    {
        parent::__construct();
        $this->imageService = $imageService;
        $this->dataPipeLine = $dataPipeLine;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pipeline = (new Pipeline)
            ->pipe($this->dataPipeLine);

        $path = storage_path('images/original');
        $files = array_values(array_filter(scandir($path), function($file) use ($path) {
            return !is_dir($path . '/' . $file);
        }));
        $this->comment('Running: '. count($files) . ' files');
        foreach($files as $file){
            $fileInfo = explode('.',$file,2);
            if(!file_exists(storage_path('json/'.$fileInfo[0].'.json'))) {
                $this->error('Cannot find file json '.$fileInfo[0].'.json, run next file');
                continue;
            }

            $json = file_get_contents(storage_path('json/'.$fileInfo[0].'.json'));

            $jsonData = json_decode($json,true);
            $pipeline->process($jsonData);
            $inputData = $jsonData['input_data'];

            $this->imageService->annotateImageByPath(storage_path('images/original/'.$file), $inputData, $file);
        }

        $this->info('Check in app/storage/images/edited/');

    }
}
