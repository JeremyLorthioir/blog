<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/index.html.twig', []);
    }

    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }

    public function show($url)
    {
        $blog_post = [
            'title' => 'Mon tout premier post',
            'content' => 'Mon premier paragraphe'
        ];
        return $this->render('blog/view.html.twig', [
            'blog_post' => $blog_post
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
