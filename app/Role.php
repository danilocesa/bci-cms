<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	use AuditingTrait;
}
