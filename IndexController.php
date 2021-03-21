<?php
namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
class IndexController extends AbstractController
{
 /**
 *@Route("/")
 */
public function home()
{
$articles = ['Artcile1', 'Article 2','Article 3'];
return $this->render('articles/index.html.twig',['articles' => $articles]);
}


/**
 * @Route("/article/save")
 */
public function save() {
    $entityManager = $this->getDoctrine()->getManager();
    $article = new Article();
    $article->setNom('Article 1');
    $article->setPrix(1000);
    
    $entityManager->persist($article);
    $entityManager->flush();
    return new Response('Article enregisté avec id '.$article->getId());
    }
}
?>
