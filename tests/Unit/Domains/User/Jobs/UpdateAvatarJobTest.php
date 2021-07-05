<?php

namespace Tests\Unit\Domains\User\Jobs;

use App\Models\User;
use Tests\TestCase;
use App\Domains\User\Jobs\EditAvatarJob;
use Illuminate\Http\UploadedFile;

class UpdateAvatarJobTest extends TestCase
{
    public function test_update_avatar_user_non_existent_job()
    {
        $fakeFile = UploadedFile::fake()->image('avatar.png');
        $job = new EditAvatarJob(-50, $fakeFile);
        $result = $job->handle();
        $this->assertFalse($result);
    }


    public function test_update_avatar_user_job()
    {
        $user = User::create([
            'name' => 'Adam',
            'email' => 'adam@adam.adam',
            'password' => 'adamadam'
        ]);
        $fakeFile = UploadedFile::fake()->image('avatar.png');
        $job = new EditAvatarJob($user->id, $fakeFile);
        $result = $job->handle();
        $this->assertTrue($result);
    }
}
