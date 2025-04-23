<?php

namespace App\Libraries;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

class Firebase
{
    protected $storage;

    public function __construct()
    {
        $serviceAccount = __DIR__.'/firebase.json';
        $factory = (new Factory)->withServiceAccount($serviceAccount);
        $this->storage = $factory->createStorage();
    }

    public function uploadImage($file, $filename)
    {
        $bucket = $this->storage->getBucket();
        $uploadedFile = fopen($file, 'r');
        $object = $bucket->upload($uploadedFile, [
            'name' => 'livros/'.$filename,
        ]);
        return $object->signedUrl(new \DateTime('+1 year'));
    }
}
