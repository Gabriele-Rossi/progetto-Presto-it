<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
     private $w;
     private $h;
     private $fileName;
     private$path;

    public function __construct($filepath , $w , $h)
    {
        $this->path = dirname($filepath);
        $this->fileName = basename($filepath);
        $this->w = $w;
        $this->h = $h;   
    }

    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        $image= Image::load($srcPath);
        $image->watermark(base_path('resources/img/watermark.png'))
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkOpacity(30)
            ->watermarkHeight(100, Manipulations::UNIT_PERCENT)    
            ->watermarkWidth(100, Manipulations::UNIT_PERCENT);   
        
        $image->crop(Manipulations::CROP_CENTER , $w, $h,)->save($destPath);
    
    }
    
}
