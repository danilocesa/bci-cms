<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class PermissionRole extends Model
{
    use AuditingTrait;
    protected $table = 'permission_role';
}
