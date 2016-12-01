<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Slides extends Model
{
    use AuditingTrait;
    protected $table = 'slides_content';
    protected $primaryKey = 'slide_content_id';
}
