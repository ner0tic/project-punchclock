<?php

namespace ProjectPunchclock\PunchclockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ProjectPunchclock\ProjectBundle\Entity\Project;
use ProjectPunchclock\PunchclockBundle\Entity\Punch;
use ProjectPunchclock\PunchclockBundle\Form\Type\PunchFormType;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class PunchController extends Controller
{
    /**
     * @Route("/punches", name="ppc_punch_index")
     * @Template("ProjectPunchclock\PunchclockBundle:Punch:index.html.twig")
     */
    public function indexAction($slug)
    {
        // project info
        $repo = $this->getDoctrine()
                     ->getRepository('ProjectPunchClockPunchclockBundle:Project');
        $project = $repo->findOneBySlug($slug);

        // punch infos
        $repo = $this->getDoctrine()
                     ->getRepository('ProjectPunchclockPunchclockBundle:Punch');
        $query = $repo->createQueryBuilder('p')
                      ->andWhere('p.Project.slug', $slug)
                      ->orderBy('p.punch_time', 'desc');
        $punches = $query->getResults();


        return array(
                'project'   => $project,
                'punches'   =>  $punches
        );
    }

    /**
     * @Route("/punch", name="ppc_punch_punch")
     * @Template("ProjectPunchclock\PunchclockBundle:punch:punch.html.twig")
     */
    public function punchAction(Request $request)
    {
        $user = $this->get('security.context')->getToken();
        $punch = new Punch();

        $form = $this->createForm(new PunchFormType(), $punch);

        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($punch);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl(
                        'ppc_developer_punch_index',
                        array(
                            'slug' => $user->getSlug()
                        )
                    )
                );
            }
        }

        return array('form'  =>  $form->createView());
    }
}
