<?php
namespace ProjectPunchclock\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    protected $available_roles = array();

    /**
     * @Route("/", name="homepage")
     * @Template("ProjectPunchclockUserBundle:User:index.html.twig")
     */
    public function indexAction()
    {
        /**
         * If the user is atleast authenticated
         * with the system then we can continue.
         */
        if ($this->get('security.context')->isGranted('ROLE_USER')) {

            $security = $this->get('security.context');

            if ($security->isGranted('ROLE_ADMIN')) {
                $this->forwardToDashboard(
                    $security->isGranted('ROLE_SUPER_ADMIN') ?
                    'ROLE_SUPER_ADMIN' :
                    'ROLE_ADMIN'
                );
            } elseif ($security->isGranted('ROLE_DEVELOPER')) {
                $this->forwardToDashboard(
                    $security->isGranted('ROLE_DEVELOPER_ADMIN') ?
                    'ROLE_DEVELOPER_ADMIN' :
                    'ROLE_DEVELOPER_USER'
                );
            } elseif ($security->isGranted('ROLE_CLIENT')) {
                $this->forwardToDashboard('ROLE_CLIENT');
            } else {
                return array();
            }
        } else {
            return $this->forward('FOSUserBundle:User:login.html.twig');
        }


    }

    public function registerAction()
    {
        $form = $this->createForm(
            new RegistrationType(),
            new Registration()
        );

        return $this->render(
            'ProjectPunchclockUserBundle:User:register.html.twig',
            array(
                'form'  =>  $form->createView()
            )
        );
    }

    public function createAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(
            new RegistrationType(),
            new Registration()
        );
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirect('ProjectPunchclockUserBundle:Dashboard:index');
        }

        return $this->render(
            'ProjectPunchclockUserBundle:User:register.html.twig',
            array(
                'form'  =>  $form->createView()
            )
        );
    }

    public function helpAction()
    {
        return $this->render('ProjectPunchclockUserBundle:Help:index.html.twig');
    }

    private function forwardToDashboard($role)
    {
        /**
         * @todo find a cleaner way to match the role to the controller
         */
        $roleEntities = array(
            'ROLE_CLIENT'               =>  'ProjectPunchclockUserBundle:Dashboard:index',
            'ROLE_DEVELOPER'            =>  'ProjectPunchclockUserBundle:Dashboard:index',
            'ROLE_DEVELOPER_ADMIN'      =>  'ProjectPunchclockUserBundle:Dashboard:index',
            'ROLE_ADMIN'                =>  'ProjectPunchclockUserBundle:Dashboard:index',
            'ROLE_SUPER_ADMIN'          =>  'ProjectPunchclockUserBundle:Dashboard:index'
        );
        $this->forward($roleEntities[$role]);
    }
}
