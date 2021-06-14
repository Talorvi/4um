<?php

namespace App\Services\Forum\Http\Controllers;

use App\Services\Forum\Features\Tag\AddTagFeature;
use App\Services\Forum\Features\Tag\DeleteTagFeature;
use App\Services\Forum\Features\Tag\GetTagFeature;
use App\Services\Forum\Features\Tag\GetTagsFeature;
use Lucid\Units\Controller;

class TagController extends Controller
{
    public function addTag()
    {
        return $this->serve(AddTagFeature::class);
    }

    public function deleteTag()
    {
        return $this->serve(DeleteTagFeature::class);
    }

    public function getTag()
    {
        return $this->serve(GetTagFeature::class);
    }

    public function getTags()
    {
        return $this->serve(GetTagsFeature::class);
    }
}
