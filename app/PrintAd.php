<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class PrintAd extends Model
{
    use AuditingTrait;
    protected $table = 'print_ad';
    protected $primaryKey = 'print_ad_id';
}
