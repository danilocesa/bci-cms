<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use OwenIt\Auditing\AuditingTrait;

class Permission extends EntrustPermission
{
	use AuditingTrait;
}
