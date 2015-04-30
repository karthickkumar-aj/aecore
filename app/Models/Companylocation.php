<?php namespace App\Models;

  use Illuminate\Auth\Authenticatable;
  use Illuminate\Database\Eloquent\Model;

  class Companylocation extends Model {
    
    protected $table = 'companylocations';
    protected $fillable = ['company_id', 'location', 'street', 'city', 'state', 'country', 'zipcode', 'phone', 'fax', 'website'];
    
    // relation
    public function company() {
      return $this->belongsTo('App\Models\Company');
    }
    
  }