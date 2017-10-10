<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newspaper extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'data', 'titulo', 'descricao', 'imagem', 'fonte', 'status', 'legenda_imagem',
        'category_id'
    ];

    /**
     * Scopes!
     */
    public function scopeDateFromTo($query, $begin = null, $end = null) {
        if (!is_null($begin) and !empty($begin)) {
            $begin = Carbon::createFromFormat('d/m/Y', $begin)->format('Y-m-d');
            $query->where("created_at", ">=", "$begin");
        }

        if (!is_null($end) and !empty($end)) {
            $end = Carbon::createFromFormat('d/m/Y', $end)->format('Y-m-d');
            $query->where("created_at", "<=", "$end");
        }
    }

    public function scopeSearchByCategory($query, $category = null) {
        if (!is_null($category) && !empty($category)) {
            $query->where('newspapers.category_id', $category);
        }
    }

    public function scopeSearchByNameDescription($query, $search = null) {
        if (!is_null($search) && !empty($search)) {
            $query->where('newspapers.titulo', 'like', '%'.$search.'%');
            $query->orWhere('newspapers.descricao', 'like', '%'.$search.'%');
        }
    }

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function gallery() {
        return $this->hasMany('App\Models\GalleryNewspaper', 'newspaper_id');
    }
}
