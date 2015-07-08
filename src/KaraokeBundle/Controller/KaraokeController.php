<?php
/**
 * Created by PhpStorm.
 * User: dorianroos
 * Date: 26/06/15
 * Time: 12:06
 */

namespace KaraokeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KaraokeController extends Controller {

    public function indexAction()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('karaoke_display'))
            ->setMethod('POST')
            ->add('heure', 'text', ['label' => 'Heure'])
            ->add('minute', 'text', ['label' => 'Minute'])
            ->add('seconde', 'text', ['label' => 'Seconde'])
            ->add('milliseconde', 'text', ['label' => 'Milliseconde'])
            ->add('file', 'file', ['label' => 'Fichier'])
            ->add('Valider', 'submit')
            ->getForm();

        return $this->render('KaraokeBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function displayAction()
    {
        $request = Request::createFromGlobals();

        $formFile = $request->files->get('form', false);
        $formTime = $request->request->get('form', false);
        if (!$formFile and !$formTime) {
            throw new \InvalidArgumentException('You have to provide a form');
        }

        $file = $formFile["file"];
        $contents = file($file->getPathname(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $extension = $file->guessExtension();

        if($formTime['heure'] == '' OR $formTime['minute'] == '' OR $formTime['seconde'] == '' OR $formTime['milliseconde'] == '') {
            throw new \InvalidArgumentException('You have to provide a valid Time');
        }

        $new_start = $formTime['heure'].':'.$formTime['minute'].':'.$formTime['seconde'].'.'.$formTime['milliseconde'];

        /** @var \DateTime $oNewTimeStart */
        $oNewTimeStart = new \DateTime($new_start);
        
        /** @var \KaraokeBundle\Services\KaraokeFileManager $oKaraokeFileManager */
        $oKaraokeFileManager = $this->get('karaoke_file_manager');
        $oKaraokeFileManager->setContent($contents);
        $oKaraokeFileManager->setExtention($extension);

        /** @var \KaraokeBundle\Model\Karaoke $oKaraoke */
        $oKaraoke = $oKaraokeFileManager->generateKaraokeObject();

        /** @var \KaraokeBundle\Services\KaraokeTimeManager $oKaraokeTimeManager */
        $oKaraokeTimeManager = $this->get('karaoke_time_manager');

        $oKaraokeTimeManager->setNewTimeStart($oNewTimeStart);
        $oKaraoke = $oKaraokeTimeManager->generateKaraokeWithNewTime($oKaraoke);

        return $this->render('KaraokeBundle:Default:display.html.twig', array());
    }

}