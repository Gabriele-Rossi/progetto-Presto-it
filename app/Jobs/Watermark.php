<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($product_image_id)
    {
        $this->product_image_id= $product_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->product_image_id);
        if(!$i) {
            return;
        }

        $image= file_get_contents(storage_path('app/public/' . $i->path));
    
        
    }
}
