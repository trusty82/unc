<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Slug',
        'NIA',
        'SIRET',
        'Address',
        'Address2',
        'City',
        'PostalCode',
        'Country',
        'Phone',
        'Type',
        'Email',
        'Logo',
        'Agree',
        'Description',
        'Website',
        'Facebook',
        'Twitter',
        'Instagram',
        'Youtube',
        'Linkedin',
        'Tiktok',
        'Pinterest',
        'Snapchat',
        'Twitch',
        'Discord',
        'Telegram',
        'Whatsapp',
    ];
}
