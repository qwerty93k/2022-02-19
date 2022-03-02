<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;

    use Sortable;

    public $sortable = ['id', 'title', 'description'];

    public $sortableAs = ['post_count_count']; // cia pasakoma sortable moduliui kad rikiuosime pagal stulpeli kuris originaliai duomenu bazeje neegzistuoja. pavadinima reikia suteikti toki
    // koks gaunamas po dd() operacijos, taciau kintamasis turi buti $sortableAs

    public function postCount()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
