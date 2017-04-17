<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Section;

use App\Framework\View;


class MainController extends Controller
{

    public function index() {

        $sections = Section::all();

        $data = Section::staticHydrate( $sections );

        var_dump( $data );

        View::show("main", ['sections' => $sections]);
    }

}