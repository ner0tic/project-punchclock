<?php
namespace ProjectPunchclock\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ProjectPunchclock\UserBundle\Entity\User;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="punchclock_dashboard")
     * @Template("ProjectPunchclockUserBundle:Dashboard:index.html.twig")
     */
    public function indexAction()
    {
        // project info
        $repo = $this->getDoctrine()
                      ->getRepository('ProjectPunchclockPunchclockBundle:Project')
                      ->createQueryBuilder('p')
                      ->andWhere('p.user_id = :id')
                      ->setParameter('id', $this->get('security.context')->getToken()->getUser()->getId())
                      ->orderBy('p.updated, p.name', 'DESC');

        // current projects
        $query = $repo->andWhere('p.status = 1');
        $c_orm = new DoctrineORMAdapter($query);
        $curr_proj = new Pagerfanta($c_orm);
        $curr_proj->setMaxPerPage($this->getRequest()->get('c_pgMax', 4));
        $curr_proj->setCurrentPage($this->getRequest()->get('c_pg', 1));

        // current projects
        $query = $repo->andWhere('p.status = 2');
        $p_orm = new DoctrineORMAdapter($query);
        $prev_proj = new Pagerfanta($p_orm);
        $prev_proj->setMaxPerPage($this->getRequest()->get('p_pgMax', 4));
        $prev_proj->setCurrentPage($this->getRequest()->get('p_pg', 1));

        /**
         * widgets info
         */
        // alerts widget
        $alerts = array(
            array(
                'type'  =>  'error',
                'text'  =>  'blah blah blah blah.'
            ),
            array(
                'type'  =>  'notice',
                'text'  =>  'blah blah blah...'
            )
        );

        // recent changes widget
        $changes = array(
            array(
                'user' => array(
                    'id'    => 1
                ),
                'text'  => 'blah blah blah blah.'
            )
        );

        // invoicing widget
        $invoices = array();

        return array(
                'current_projects'          =>  $curr_proj->getCurrentPageResults(),
                'current_projects_pager'    =>  $curr_proj,
                'previous_projects'         =>  $prev_proj->getCurrentPageResults(),
                'previous_projects_pager'   =>  $prev_proj,
                'alerts'                    =>  $alerts,
                'recent_changes'            =>  $changes,
                'invoicing'                 =>  $invoices
        );
    }
}
