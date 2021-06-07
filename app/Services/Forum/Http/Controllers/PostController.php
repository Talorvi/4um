<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Post\AcceptPostFeature;
use App\Services\Forum\Features\Post\AddPostFeature;
use App\Services\Forum\Features\Post\DeletePostFeature;
use App\Services\Forum\Features\Post\DenyPostFeature;
use App\Services\Forum\Features\Post\EditPostFeature;
use App\Services\Forum\Features\Post\GetPostFeature;
use App\Services\Forum\Features\Post\GetPostsFeature;
use Lucid\Units\Controller;

class PostController extends Controller
{
    public function addPost()
    {
        return $this->serve(AddPostFeature::class);
    }

    public function editPost()
    {
        return $this->serve(EditPostFeature::class);
    }

    public function deletePost()
    {
        return $this->serve(DeletePostFeature::class);
    }

    public function getPost()
    {
        return $this->serve(GetPostFeature::class);
    }

    public function getPosts()
    {
        return $this->serve(GetPostsFeature::class);
    }

    public function acceptPost()
    {
        return $this->serve(AcceptPostFeature::class);
    }

    public function denyPost()
    {
        return $this->serve(DenyPostFeature::class);
    }
}
