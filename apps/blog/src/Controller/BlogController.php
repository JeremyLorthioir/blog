<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class BlogController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/index.html.twig', []);
    }

    public function about()
    {
        return $this->render('blog/about.html.twig', []);
    }

    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }

    public function show($url, MarkdownParserInterface $parser)
    {
        $blog_post = [
            'title' => 'Mon tout premier post',
            'content' => ''
        ];
        return $this->render('blog/view.html.twig', [
            'blog_post' => $blog_post,
            'html_content' => $blog_post['content']
        ]);
    }

    public function edit($id)
    {
        return new Response('<h1>Modifier l\'article ' . $id . '</h1>');
    }

    public function remove($id)
    {
        return new Response('<h1>Supprimer l\'article ' . $id . '</h1>');
    }
}
