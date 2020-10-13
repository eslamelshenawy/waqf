<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{

    protected $guarded = [];

    protected $table = 'journal_details';

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
