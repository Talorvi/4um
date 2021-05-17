<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\AddThreadFeature;
use App\Services\Forum\Features\DeleteThreadFeature;
use Lucid\Units\Controller;

class ThreadController extends Controller
{
    public function addThread()
    {
        return $this->serve(AddThreadFeature::class);
    }

    public function editThread()
    {
        return $this->serve(DeleteThreadFeature::class);
    }

    public function deleteThread()
    {
        return $this->serve(DeleteThreadFeature::class);
    }

    public function getThread()
    {

    }

    public function getThreads()
    {

    }
}
