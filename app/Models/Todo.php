<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function getDetail()
    {
        $txt = 'id:' .$this->id . '' .$this->content;
        return $txt;
    }
}
