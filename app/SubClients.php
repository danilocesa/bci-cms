<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class SubClients extends Model
{
    use AuditingTrait;
    protected $table = 'sub_clients';
    protected $primaryKey = 'sub_clients_id';
}
