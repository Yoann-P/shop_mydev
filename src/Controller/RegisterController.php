<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordHasherInterface $encoder)
    {
        //$headers = $this->entityManager->getRepository(Header::class)->findAll();
        $headers = '';
        $notification = null;
        $notificationIsEmail = null;
        $notificationIsPseudo = null;

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();


            $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
            $search_pseudo = $this->entityManager->getRepository(User::class)->findOneByPseudo($user->getPseudo());

            if (!$search_email && !$search_pseudo) {

                $password = $encoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);

                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $mail = new Mail();
                $content = "Bonjour " . $user->getFirstname() . "<br/>Vous avez bien été enregistré.<br/><br/>Vous pouvez dès à présent effectuer vos premiers achats sur votre compte démo.";
                $mail->send($user->getEmail(), $user->getFirstname(), 'Bienvenue sur shop.mydev.fr démo', $content);
                return $this->redirectToRoute('validation_email_inscription');
                // $notification = "Votre inscription s'est correctement déroulée. Vous pouvez dès à présent vous connecter à votre compte.";
            } else {
                if ($search_email) {
                    $notificationIsEmail = "L'email que vous avez renseigné existe déjà.";
                }
                if ($search_pseudo) {
                    $notificationIsPseudo = "Le pseudo que vous avez renseigné existe déjà.";
                }
            }
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification,
            'notificationIsPseudo' => $notificationIsPseudo,
            'notificationIsEmail' => $notificationIsEmail,
            'headers' => $headers

        ]);
    }
}
