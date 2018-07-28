<?php

namespace App\Controller;


class ArticleController
{
    /**
     * Rendering bikeBlog page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showBikeBlog() : Response
    {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render("bikeBlog/bikeBlog.html.twig", [
            'articles' => $articles,
        ]);
    }

    /**
     * Rendering article page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showArticle($id) : Response
    {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render("bikeBlog/article.html.twig", [
            'article' => $article,
        ]);
    }
}