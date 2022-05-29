<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public static $rules = array(
        'fullname' => 'required',
        'gender' => 'integer|min:1|max:2',
        'email' => 'required|email',
        'postcode' => 'required|size:8|alpha_dash',
        'address' => 'required',
        'opinion' => 'required|max:120',
    );

    public function getGender() {
        if ($this->gender == 1) {
            $txt = '男性';
        }
        else {
            $txt = '女性';
        }

        return $txt;
    }

    public function getShortOpinion() {
        $txt = mb_strimwidth($this->opinion, 0, 54, '...', 'UTF-8');
        return $txt;
    }
}
