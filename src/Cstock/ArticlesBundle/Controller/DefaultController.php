<?php

namespace Cstock\ArticlesBundle\Controller;
// namespace ;


use Cstock\ArticlesBundle\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CstockArticlesBundle:Default:index.html.twig', array('name' => $name));
    }

    // probando de crear un árticulo.
    public function createAction()
    {

        $article = new Articles();
        $article->setCode('12121212');
        $article->setName('nombre articulo');
        $article->setDescription('esta es la sdesdsad articulo');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('Created article id '.$article->getId());
    }


    public function newArticleAction(Request $request)
    {
        
        $new_article = new Articles();
        $new_article->setCode('987736');

        $form = $this->createFormBuilder($new_article)
                                    ->add('name', 'text', array('required' => false, 'label' => 'Nombre: '))
                                    ->add('code', 'text', array('label' => 'Código: '))
                                    ->add('description', 'text', array('required' => false, 'label' => 'Descripción: '))
                                    ->add('reference', 'text', array('required' => false, 'label' => 'Referencia: '))
                                    ->add('heading', 'text', array('required' => false, 'label' => 'Categoría: '))
                                    ->getForm();
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                // grabar en la base de datos

                return $this->render('CstockArticlesBundle:Default:new_created.html.twig');
            }

        }

        return $this->render('CstockArticlesBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }





}
