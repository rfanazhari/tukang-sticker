<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'whatsapp_url', 
        'tlp', 
        'email1', 
        'email2', 
        'alamat1', 
        'alamat2', 
        'facebook', 
        'twitter', 
        'instagram',
        'linkedin',
        'based_64_about_us1',
        'based_64_about_us2',
        'based_64_about_us3',
        'based_64_about_us4',
        'based_64_contact_us',
        'based_64_service',
        'based_64_client',
        'based_64_career',
        'tag_about',
        'tag_service',
        'tag_client',
        'tag_career',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
