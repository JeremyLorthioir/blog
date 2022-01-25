<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

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

    public function contact(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $message = (new Email())
                ->from('contact@jerem-dev.fr')
                ->to('jeremy.lorthioir24@gmail.com')
                ->subject('[JEREM DEV] Nouvelle demande de contact')
                ->html(
                    '<h1 style="color: #2d2d2d;font-size: 2rem;font-family: Lato, sans-serif;">Nouvelle demande de contact !</h1>
                    <p><b style="text-decoration:underline;">Nom :</b> ' . $contactFormData['nom'] . '</p>' .
                        '<p><b style="text-decoration:underline;">Email :</b> ' . $contactFormData['email'] . '</p>' .
                        '<p><b style="text-decoration:underline;">Telephone :</b> ' . $contactFormData['telephone'] . '</p>' .
                        $contactFormData['message']
                );
            $mailer->send($message);
            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('contact');
        }
        return $this->render('blog/contact.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }

    public function add()
    {
        return new Response('<h1>Ajouter un article</h1>');
    }

    public function show(int $id)
    {
        $blog_post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        if (!$blog_post) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

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
