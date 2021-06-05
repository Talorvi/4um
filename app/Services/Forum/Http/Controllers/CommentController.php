<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Comment\AddCommentFeature;
use App\Services\Forum\Features\Comment\DeleteCommentFeature;
use App\Services\Forum\Features\Comment\EditCommentFeature;
use App\Services\Forum\Features\Comment\GetCommentFeature;
use App\Services\Forum\Features\Comment\GetCommentsFeature;
use Lucid\Units\Controller;

class CommentController extends Controller
{
    public function addComment()
    {
        return $this->serve(AddCommentFeature::class);
    }

    public function editComment()
    {
        return $this->serve(EditCommentFeature::class);
    }

    public function deleteComment()
    {
        return $this->serve(DeleteCommentFeature::class);
    }

    public function getComment()
    {
        return $this->serve(GetCommentFeature::class);
    }

    public function getComments()
    {
        return $this->serve(GetCommentsFeature::class);
    }
}
