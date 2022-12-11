<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FileUpload implements ShouldQueue
{
    public $file_name;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param $file_name
     */
    public function __construct($file_name)
    {
        $this->file_name=$file_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Video::create(['path'=>$this->file_name]);
    }
}
