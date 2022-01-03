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

    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }

    public function show($url, MarkdownParserInterface $parser)
    {
        $blog_post = [
            'title' => 'Mon tout premier post',
            'content' => '<h2>Titre du post</h2><pre><code class="language-css hljs"><span class="hljs-keyword">@font-face</span> {
                <span class="hljs-attribute">font-family</span>: Chunkfive; <span class="hljs-attribute">src</span>: <span class="hljs-built_in">url</span>(<span class="hljs-string"></span>);
              }
              
              <span class="hljs-selector-tag">body</span>, <span class="hljs-selector-class">.usertext</span> {
                <span class="hljs-attribute">color</span>: <span class="hljs-number">#F0F0F0</span>; <span class="hljs-attribute">background</span>: <span class="hljs-number">#600</span>;
                <span class="hljs-attribute">font-family</span>: Chunkfive, sans;
                <span class="hljs-attr">--heading-1</span>: <span class="hljs-number">30px</span>/<span class="hljs-number">32px</span> Helvetica, sans-serif;
              }
              
              <span class="hljs-keyword">@import</span> url(print.css);
              <span class="hljs-keyword">@media</span> print {
                <span class="hljs-selector-tag">a</span><span class="hljs-selector-attr">[href^=http]</span><span class="hljs-selector-pseudo">::after</span> {
                  <span class="hljs-attribute">content</span>: <span class="hljs-built_in">attr</span>(href)
                }
              }
              </code></pre>'
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
