<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\AddThreadFeature;
use App\Services\Forum\Features\DeleteThreadFeature;
use App\Services\Forum\Features\EditThreadFeature;
use App\Services\Forum\Features\GetThreadFeature;
use App\Services\Forum\Features\GetThreadsFeature;
use Lucid\Units\Controller;

class ThreadController extends Controller
{
    public function addThread()
    {
        return $this->serve(AddThreadFeature::class);
    }

    public function editThread()
    {
        return $this->serve(EditThreadFeature::class);
    }

    public function deleteThread()
    {
        return $this->serve(DeleteThreadFeature::class);
    }

    public function getThread()
    {
        return $this->serve(GetThreadFeature::class);
    }

    public function getThreads()
    {
        return $this->serve(GetThreadsFeature::class);
    }
}
