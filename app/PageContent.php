<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class PageContent extends Model
{
	use AuditingTrait;
    protected $table = 'page_content';
    protected $primaryKey = 'page_content_id';

}
