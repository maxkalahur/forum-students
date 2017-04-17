<?php
namespace App\Models;

use App\Models\Model;


class Topic extends Model
{
    protected $table = 'topics';
    protected $id, $title, $section_id;

}