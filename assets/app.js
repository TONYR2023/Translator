// Importez Bootstrap CSS
import 'bootstrap/dist/css/bootstrap.min.css';

// Importez Bootstrap JS (pour la gestion des composants JavaScript)
import 'bootstrap';

// Vous pouvez également ajouter d'autres fichiers JavaScript ou CSS ici.

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/apps/app.css';
import { startStimulusApp } from '@symfony/stimulus-bridge';
import { Translator } from '@symfony/ux-translator';

// Démarrage de Stimulus
const app = startStimulusApp();

// Utilisation du Translator
const translator = new Translator();

