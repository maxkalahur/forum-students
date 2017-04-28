<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Section;

use App\Framework\View;

class MainController extends Controller
{

    public function index() {

        $sections = Section::all();

        $mail = $this->servicesContainer->emailSender;
        $mail->send(
            $this->config,
            'kalagur@inbox.ru',
            'test',
            'Hi! <hr><strong>test</strong>'
        );

        View::show("main", ['sections' => $sections]);
    }

}