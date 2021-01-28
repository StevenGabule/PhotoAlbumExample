<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_photos = file_get_contents('https://jsonplaceholder.typicode.com/photos');
        $photos = json_decode($json_photos);
        $arr_photo = [];
        foreach ($photos as $photo) {
            $arr_photo[] = [
                "album_id" => $photo->albumId,
                "title" => $photo->title,
                "url" => $photo->url,
                "thumbnail_url" => $photo->thumbnailUrl,
            ];
        }

        Photo::insert($arr_photo);
    }
}
