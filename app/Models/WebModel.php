<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WebModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WebModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebModel query()
 * @mixin \Eloquent
 */
class WebModel extends Model
{
    use HasFactory;
    protected $table = "tbl_web";
    protected $primaryKey = 'web_id';
    protected $fillable = [
        'web_nama',
        'web_logo',
        'web_deskripsi'
    ];
}
