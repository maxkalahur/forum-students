<?php

$_routes = [

    '/' => ['handler' => ['MainController','index']],
    '/vk-callback' => ['handler' => ['VkController','vkCallback']],

    '/section/([a-z]*)/([0-9]+)' => ['handler' => ['ForumController','showTopic']],
    '/section/([a-z]*)' => ['handler' => ['ForumController','showSection']],


];