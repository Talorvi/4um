<?php

namespace App\Services\Forum\Http\Controllers;

use App\Domains\Thread\Jobs\GetFollowedThreadsJob;
use App\Services\Forum\Features\Thread\AddThreadFeature;
use App\Services\Forum\Features\Thread\DeleteThreadFeature;
use App\Services\Forum\Features\Thread\EditThreadFeature;
use App\Services\Forum\Features\Thread\FollowThreadFeature;
use App\Services\Forum\Features\Thread\GetThreadFeature;
use App\Services\Forum\Features\Thread\GetThreadsFeature;
use App\Services\Forum\Features\Thread\VoteForThreadFeature;
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

    public function getFollowedThreads()
    {
        return $this->serve(GetFollowedThreadsJob::class);
    }

    public function followThread()
    {
        return $this->serve(FollowThreadFeature::class);
    }

    public function voteForThread()
    {
        return $this->serve(VoteForThreadFeature::class);
    }
}
