<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image'];

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("{$folder}");
        }
        return $image;
    }

    public function getImage()
    {
        if (str_contains($this->image, 'http')) {
            return asset($this->image);
        }

        return asset("public/storage/{$this->image}");
    }

    public function getArticleDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }
}
