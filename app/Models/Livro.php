<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //Define os campos que podem ser preenchidos em massa
    protected $fillable = ['autor', 'titulo', 'ano_publicacao'];

}


