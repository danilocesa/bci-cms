<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class PageVideos extends Model
{
    use AuditingTrait;
    protected $table = 'page_videos';
    protected $primaryKey = 'page_video_id';
}
