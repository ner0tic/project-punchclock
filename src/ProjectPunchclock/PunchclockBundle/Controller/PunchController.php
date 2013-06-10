<?php

namespace ProjectPunchclock\PunchclockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\Project;
use Ddnet\PortfolioBundle\Form\Type\ProjectType;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class PunchController extends Controller
{
    /**
     * @Route("/{slug}/punches", name="punchclock_punches_by_project")
     * @Template("ProjectPunchclock\PunchclockBundle:Punch:list.html.twig")
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


        return $this->render(
            'ProjectPunchclockPunchclockBundle:Punch:list.html.twig',
            array(
                'project'   => $project,
                'punches'   =>  $punches
            )
        );
    }

    /**
     * @Route("/{slug}/punch", name="punchclock_punches_punch")
     * @Template("ProjectPunchclock\PunchclockBundle:punch:punch.html.twig")
     */
    public function punchAction(Request $request)
    {
        $punch = new Punch();

        $form = $this->createForm(new PunchType(), $punch);

        if ('POST' == $this->getRequest()->getMethod()) {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($punch);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl(
                        'punchclock_punches_by_project',
                        array(
                            'slug' => $punch->getProject()->getSlug()
                        )
                    )
                );
            }
        }

        return array('form'  =>  $form->createView());
    }
}
