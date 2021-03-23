<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class DropzoneControllerTest extends TestCase
{

    public function test_store()
    {

        Storage::fake('files');

        $this->postJson('/images', [
            'file' => $fileName = UploadedFile::fake()->create('document.pdf')

        ]);

        // Assert the file was stored...
        Storage::disk('files')->assertExists('files/' .$fileName->hashName());

        // Assert a file does not exist...
        Storage::disk('files')->assertMissing($fileName);
    }
}
