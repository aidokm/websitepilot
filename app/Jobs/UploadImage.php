<?php

namespace App\Jobs;


use App\portifolio;
use Illuminate\Bus\Queueable;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $portifolio;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(portifolio $portifolio)
    {
        $this->portifolio = $portifolio;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $disk = $this->portifolio->disk;
        $filename = $this->portifolio->image;
        $original_file = storage_path() . '/uploads/original/'.  $filename;

        try{

            //create large image and save it to tmp disk


            Image::make($original_file)
            ->fit(800,600, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($large = storage_path('uploads/large/'. $filename));

          //create large image and save it to tmp disk
            Image::make($original_file)
            ->fit(250,200, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($thumbnail = storage_path('uploads/thumbnail/'. $filename));

            //store images to permanent disk
            //original image

           if( Storage::disk($disk)
            ->put('uploads/designs/original/'.$filename, fopen($original_file,'r+')))
            {
                File::delete($original_file);
            }

             //thumbnail image

           if( Storage::disk($disk)
           ->put('uploads/designs/thumbnail/'.$filename, fopen($thumbnail,'r+')))
           {
               File::delete($thumbnail);
           }

            //large image

            if( Storage::disk($disk)
            ->put('uploads/designs/large/'.$filename, fopen($large,'r+')))
            {
                File::delete($large);
            }

            //update the database record with success flag
/*
            $this->design->update([
                'upload_successful' => true
            ]); */
        }catch(\Exception $e){
            \Log::error($e->getMessage());
        }
    }
}
