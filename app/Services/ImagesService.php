<?php

namespace App\Services;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Illuminate\Http\UploadedFile;
use Exception;

class ImagesService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }
    public function upload(UploadedFile $file, string $folder = 'uploads', ?string $filename = null): string
    {
        try {
            $options = [
                'folder' => $folder,
            ];

            if ($filename) {
                $options['public_id'] = $filename;
                $options['overwrite'] = true;
                $options['invalidate'] = true;
            }

            $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), $options);

            return $result['secure_url'];

        } catch (Exception $e) {
            throw new Exception("Error Upload File : " . $e->getMessage());
        }
    }
    public function uploadMultiple(array $files, string $folder = 'uploads'): array
    {
        $urls = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $urls[] = $this->upload($file, $folder);
            }
        }
        return $urls;
    }
}
