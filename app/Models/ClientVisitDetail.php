<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientVisitDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_name',
        'visitor_contact',
        'visitor_email',
        'gender',
        'property_id',
        'property_name', // Add property_name to the fillable array
        'visit_date',
        'additional_message',
    ];

    // Define accessor methods for emailData variables
    public function getVisitorNameAttribute()
    {
        return $this->attributes['visitor_name'];
    }

    public function getVisitorEmailAttribute()
    {
        return $this->attributes['visitor_email'];
    }

    public function getVisitorContactAttribute()
    {
        return $this->attributes['visitor_contact'];
    }

    public function getGenderAttribute()
    {
        return $this->attributes['gender'];
    }

    public function getVisitDateAttribute()
    {
        return $this->attributes['visit_date'];
    }

    public function getPropertyNameAttribute()
    {
        // Check if property_details relationship exists and is not null
        if ($this->property_details && $this->property_details->property_name) {
            return $this->property_details->property_name;
        } else {
            // Return a default value or handle null case as per your requirement
            return 'N/A';
        }
    }

    public function getAdditionalMessageAttribute()
    {
        return $this->attributes['additional_message'];
    }

    // Define the relationship with PropertyDetail model
    public function property_details()
    {
        return $this->belongsTo(PropertyDetail::class, 'property_id');
    }
}
