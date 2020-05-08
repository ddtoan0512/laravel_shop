<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'badge-pill badge-success'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'badge-pill badge-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->a_active, '[N\A]');
    }
}
