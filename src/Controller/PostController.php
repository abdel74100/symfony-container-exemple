<?php

namespace App\Controller;
use cebe\markdown\Markdown;
use App\helpers\MarkdownHelper;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     */
    public function index(PostRepository $Repository,MarkdownHelper $helper)
    {
        $posts = $Repository->findall();
        $parsedPosts=$helper->parse($posts);
        
       
        return $this->render('post/index.html.twig', [
            'posts' => $parsedPosts
        ]);
    }
}
