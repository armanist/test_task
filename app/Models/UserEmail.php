<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'email_id',
        'subject',
        'bodyPreview',
        'parentFolderId',
        'from',
        'to',
        'isDraft',
        'isRead',
        'createdDateTime',
    ];
}
