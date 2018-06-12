<?php

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

namespace App\Classes;

class My_Face
{
    private $app_id = '0d71082b';
    private $key = 'e2858fa6fb8de481d78d5da71586c871';
    private $gallery_name = 'MyGallery';
    private $client = '';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    private function action(String $url, $data = array())
    {
        try {
            $res = $this->client->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'app_id' => $this->app_id,
                    'app_key' => $this->key,
                ],
                'json' => $data,
                ]);

            return json_decode($res->getBody());
        } catch (\Exception $e) {
            return false;
        }
    }

    public function view()
    {
        $data = $this->action('https://api.kairos.com/gallery/view', ['gallery_name' => 'MyGallery']);

        return $data ?? '';
    }

    public function enroll($image, $label)
    {
        // to get base64
        // $image_data = base64_encode(file_get_contents($args["image_path"]));
        $image = base64_encode(file_get_contents($image));
        $data = $this->action('https://api.kairos.com/enroll',
        [
        'image' => $image,
        'subject_id' => $label,
        'gallery_name' => $this->gallery_name,
        ]
    );

        return $data ?? '';
    }

    public function recognize($image)
    {
        $image = base64_encode(file_get_contents($image));
        $data = $this->action('https://api.kairos.com/recognize',
        [
        'image' => $image,
        'gallery_name' => $this->gallery_name,
        ]
    );

        return $data ?? '';
    }
}
