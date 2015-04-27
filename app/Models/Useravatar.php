<?php namespace App\Models;

  use Illuminate\Auth\Authenticatable;
  use Illuminate\Database\Eloquent\Model;

  class Useravatar extends Model {
    
    protected $table = 'useravatars';
    protected $fillable = ['user_id', 'file_id_sm', 'file_id_lg'];
    
    // relation
    public function user() {
      return $this->belongsTo('App\Models\User');
    }
    
  }