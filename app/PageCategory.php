<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class PageCategory extends Model
{
	use AuditingTrait;
    protected $table = 'page_category';
    protected $primaryKey = 'page_category_id';
}
