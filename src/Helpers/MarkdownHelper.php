<?php

namespace App\Helpers;

use cebe\markdown\Markdown;

class MarkdownHelper 
{

    protected $parser;

    public function __construct(Markdown $parser){
        $this->parser = $parser;
    }

    public function parse(array $posts) : array {

        $parsedPosts = [];

        foreach($posts as $post){
            $parsedPosts[] = [
                'title' => $post->getTitle(),
                'content' => $this->parser->parse($post->getContent())
            ];
        }
        return $parsedPosts;
    }
}





?>