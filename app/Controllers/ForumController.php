<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Framework\Routing;
use App\Models\{Section, Topic, Post};
use App\Models\User;

use App\Framework\View;
use App\Database\DB;


class ForumController extends Controller
{
    public function showTopic() {

        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];
        $topicId = $routeData[3];

        $section = Section::getBySlug( $sectionSlug )[0];
        $topic = Topic::get( $topicId )[0];
        $posts = Post::getByTopic_id( $topicId );

        View::show("topic",
            ['section' => $section,'posts' => $posts, 'topic' => $topic]
        );
    }

    public function showSection() {

        $routeData = Routing::getRouteArgs();
        $sectionSlug = $routeData[2];

        $section = Section::getBySlug( $sectionSlug )[0];
        $topics = Topic::getBySection_id( $section->getId() );

//        $section = DB::select( 'SELECT * FROM sections WHERE slug = ?', [$sectionSlug] );
//
//        $topics = DB::select(
//            'SELECT * FROM topics
//            WHERE section_id = ?',
//            [$section[0]['id']]
//        );

        View::show("section",
            ['section' => $section, 'topics' => $topics]
        );
    }

}