<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class DefaultController extends AbstractController
{
    /// Page d'accueil avec la locale
    #[Route('/{_locale}/', name: 'home', requirements: ['_locale' => 'fr|en'])]
    public function index(string $_locale): Response
    {
        return $this->render('home.html.twig', [
            'current_page' => 'home',
            '_locale' => $_locale,
        ]);
    }

    // Page Prestations
    #[Route('/{_locale}/prestations', name: 'prestations', requirements: ['_locale' => 'fr|en'])]
    public function prestations(string $_locale): Response
    {
        return $this->render('prestations.html.twig', [
            'current_page' => 'prestations',
            '_locale' => $_locale,
        ]);
    }

    // Page Tourisme
    #[Route('/{_locale}/tourism', name: 'tourism', requirements: ['_locale' => 'fr|en'])]
    public function tourism(string $_locale): Response
    {
        return $this->render('tourism.html.twig', [
            'current_page' => 'tourism',
            '_locale' => $_locale,
        ]);
    }

    // Changement de langue
    #[Route('/{_locale}/switch-language', name: 'switch_language', requirements: ['_locale' => 'fr|en'])]
    public function switchLanguage(
        string $_locale,
        SessionInterface $session,
        Request $request
    ): RedirectResponse {
        // Mise à jour de la langue dans la session
        $session->set('_locale', $_locale);

        // Rediriger vers l'URL précédente ou l'accueil avec la locale mise à jour
        $referer = $request->headers->get('referer');
        if (!$referer) {
            // Si aucune URL précédente, rediriger vers la page d'accueil avec la locale
            return $this->redirectToRoute('home', ['_locale' => $_locale]);
        }

        // Extraire le chemin de l'URL précédente
        $path = parse_url($referer, PHP_URL_PATH);

        // Remplacer la locale dans l'URL
        $updatedPath = preg_replace('/^\/[a-z]{2}/', '/' . $_locale, $path);

        // Rediriger vers la nouvelle URL avec la locale modifiée
        return $this->redirect($updatedPath);
    }


}
