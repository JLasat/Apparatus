<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apparatus extends Model
{

    use HasFactory;

    protected $table ="apparatus";
    protected $primaryKey = "id";

    protected $fillable = [
        'subject',
        'course',
        'year',
        'section',
        'date_to_be_used',
        'group_no',
        'teacher',
        'experiment_no',
        'time',
        'items',
        'quantity',
        'remarks'

    ];


}
