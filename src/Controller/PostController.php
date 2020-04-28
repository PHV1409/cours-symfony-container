<?php

namespace App\Controller;

use cebe\markdown\Markdown;
use App\Helpers\MarkdownHelper;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     */
    public function index(PostRepository $repository, MarkdownHelper $helper)
    {
        $posts = $repository->findAll();

        $parsedPosts = $helper->parse($posts);
        
        return $this->render('post/index.html.twig', [
            'posts' => $parsedPosts
        ]);
    }
}
