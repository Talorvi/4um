<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Support\Facades\Request;
use Lucid\Units\Job;

class ValidateRegisterUserInputJob extends Job
{
    private $input;
    /**
     * Create a new job instance.
     *
     * @param $input
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }
}
