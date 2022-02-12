<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Cookie\CookieValuePrefix;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
    ];


    private static $books = [
        [
            "id" => 1,
            "title" => "First Book",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis ex molestiae at accusantium expedita soluta autem vel nemo quae! Reiciendis consectetur cupiditate recusandae unde reprehenderit aspernatur asperiores minima id error magni earum illum distinctio odit labore sunt suscipit aliquam magnam, sapiente, quis nostrum. Voluptatum nemo, asperiores dolorem incidunt error numquam illo? In dolore repellat vitae porro nemo incidunt recusandae nobis, autem illo consequuntur modi quam iste? Voluptates tenetur velit voluptatem explicabo quae cum molestias iste eveniet sint architecto. In quidem laboriosam recusandae consequuntur consectetur totam vero nisi. Quae distinctio, eos sapiente recusandae, laborum quos explicabo eius, autem dolores cumque accusamus!"
        ],[
            "id" => 2,
            "title" => "Second Book",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis ex molestiae at accusantium expedita soluta autem vel nemo quae! Reiciendis consectetur cupiditate recusandae unde reprehenderit aspernatur asperiores minima id error magni earum illum distinctio odit labore sunt suscipit aliquam magnam, sapiente, quis nostrum. Voluptatum nemo, asperiores dolorem incidunt error numquam illo? In dolore repellat vitae porro nemo incidunt recusandae nobis, autem illo consequuntur modi quam iste? Voluptates tenetur velit voluptatem explicabo quae cum molestias iste eveniet sint architecto. In quidem laboriosam recusandae consequuntur consectetur totam vero nisi. Quae distinctio, eos sapiente recusandae, laborum quos explicabo eius, autem dolores cumque accusamus!"
        ],[
            "id" => 3,
            "title" => "Third Book",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis ex molestiae at accusantium expedita soluta autem vel nemo quae! Reiciendis consectetur cupiditate recusandae unde reprehenderit aspernatur asperiores minima id error magni earum illum distinctio odit labore sunt suscipit aliquam magnam, sapiente, quis nostrum. Voluptatum nemo, asperiores dolorem incidunt error numquam illo? In dolore repellat vitae porro nemo incidunt recusandae nobis, autem illo consequuntur modi quam iste? Voluptates tenetur velit voluptatem explicabo quae cum molestias iste eveniet sint architecto. In quidem laboriosam recusandae consequuntur consectetur totam vero nisi. Quae distinctio, eos sapiente recusandae, laborum quos explicabo eius, autem dolores cumque accusamus!"
        ],
    ];

    public static function all() {
        return collect(self::$books);
    }

    public static function find($id) {
        return static::all()->where("id", $id)->first();
    }
}
