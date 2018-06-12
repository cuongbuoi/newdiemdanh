<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    //
    protected $table = 'sinhviens';
    protected $fillable=['id','masv','hoten','gioitinh','malop'];
    public $timestamps=true;
    public function lop()
    {
    	return $this->belongsTo('App\Lop');
    }
}
