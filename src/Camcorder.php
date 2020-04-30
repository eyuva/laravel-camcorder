<?php

namespace Eyuva\Camcorder;


use Symfony\Component\Process\Process;

class Camcorder
{
    protected $fps;
    protected $seq_file;
    protected $seq_file_path;
    protected $audio_file_path;

    public function __construct()
    {
        $this->fps = config('camcorder.fps',25);
        $this->seq_file_path = storage_path('app/'.rand().'.txt');
        $this->seq_file = fopen($this->seq_file_path, 'w');
        fwrite($this->seq_file, "ffconcat version 1.0\n");
        fclose($this->seq_file);
        $this->seq_file = fopen($this->seq_file_path, 'a');
    }

    public function addImage($image_path, $duration = 1, $is_last = 0){
        fwrite($this->seq_file, "file '".$image_path."'\n");
        fwrite($this->seq_file, "duration ".$duration."\n");
        if($is_last){
            fwrite($this->seq_file, "file '".$image_path."'\n");
            fwrite($this->seq_file, "duration 1 \n");
        }
    }

    public function addAudio($audio_path)
    {
       $this->audio_file_path = $audio_path;
    }

    public function generate($output_path,$file_name)
    {
        $cmd = 'ffmpeg';

        //Add Images
        if(filesize($this->seq_file_path)) {
            $cmd .=' -f concat -safe 0 -i ' . $this->seq_file_path ;
        }

        //Add Audio
        if(filesize($this->audio_file_path)) {
            $cmd .= ' -i '.$this->audio_file_path.' -shortest';
        }

        //Video Filters
        $cmd .= ' -vf format=yuv420p,fps=' . $this->fps;

        //Output
        $cmd .=  ' '.$output_path.'/'.$file_name.'.mp4  -y';

        $process = new Process($cmd);
        $process->run();

        unlink($this->seq_file_path);
        if (! $process->isSuccessful()) {
            throw new \Exception(trim($process->getErrorOutput()));
        }
    }
}
