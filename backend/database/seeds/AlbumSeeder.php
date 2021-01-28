<?php

use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_albums = file_get_contents('https://jsonplaceholder.typicode.com/albums');
        $albums = json_decode($json_albums);
        $arr_album = [];
        foreach ($albums as $album) {
            $arr_album[] = [
                "user_id" => $album->userId,
                "title" => $album->title,
            ];
        }

        \App\Album::insert($arr_album);
    }
}
