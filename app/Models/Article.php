<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = ['name', 'body'];
    /**
     * @var mixed
     */
    private $state;


    public function getPublishedData()
    {
        $data = self::all();
        $data->filter(function ($value) {
            return $value['state'] == 'published';
        });
        return $data;
    }

    public function comments() {
        return $this->hasMany(ArticleComments::class, 'article_id');
    }
}
