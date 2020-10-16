<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'title', 'published_at', 'category_id', 'user_id',
    ];

    protected $dates = ['published_at'];

    protected $appends = ['published_date'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName()
    {

        return 'url';
    }

    public function category() // $post->category->name
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() // Un post pertenece a muchos tags
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos() // Un post tiene muchas fotos
    {
        return $this->hasMany(Photo::class);
    }

    public function owner() // Propietario del Post
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        $query->with(['owner', 'category', 'tags', 'photos'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        //Si es admin, mostramos todos
        if (auth()->user()->can('view', $this)) {
            return $query;
        }
        //Si no es admin, mostramos solo los post que sean suyos
        return $query->where('user_id', auth()->id());
    }

    public function scopeByYearAndMonth($query)
    {
        return $query->selectRaw('year(published_at) year')
            ->selectRaw('month(published_at) month')
            ->selectRaw('monthname(published_at) monthname')
            /* ->selectRaw('count(*) posts')
            ->groupBy('year', 'month', 'monthname') */
            ->orderBy('published_at');
    }

    public function isPublished()
    {
        return !is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);

        if ($this->whereUrl($url)->exists()) {
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;

        $this->save();
    }

    //Pasamos el nombre del atributo a cambiar setTitleAttribute($title), setNameAttribute($name), etc...
    /*  public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;

        $url = str_slug($title);
        $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

        if($duplicateUrlCount)
        {
            $url .= "-" . ++$duplicateUrlCount;
        }

        $this->attributes['url'] = $url;
    } */

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function viewType($home = '')
    {
        if ($this->photos->count() === 1) :
            return 'posts.photo';
        elseif ($this->photos->count() > 1) :
            return $home === 'home' ? 'posts.carousel-preview' : 'posts.carousel';
        elseif ($this->iframe) :
            return 'posts.iframe';
        else :
            return 'posts.text';
        endif;
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('M d');
    }
}
