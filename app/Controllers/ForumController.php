<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Framework\Routing;
use App\Models\User;

use App\Framework\View;
use App\Database\DB;


class ForumController extends Controller
{

    public function showTopic() {

        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];
        $topicId = $routeData[3];


        var_dump( Routing::getRouteArgs() );

        echo 'topic';

    }

    public function showSection() {

        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];

        $section = DB::select( 'SELECT * FROM sections WHERE slug = ?', [$sectionSlug] );
        var_dump( $section[0] );

        $topics = DB::select(
            'SELECT * FROM topics 
            WHERE section_id = ?',
            [$section[0]['id']]
        );
        var_dump( $topics[0] );

        echo 'section';

    }

}