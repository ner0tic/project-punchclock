<?php
namespace ProjectPunchclock\PunchclockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use ProjectPunchclock\PunchclockBundle\Entity\PunchKind;
use ProjectPunchclock\PunchclockBundle\Form\Type\PunchKindFormType;

class PunchKindController extends Controller
{
    public function indexAction()
    {

    }

    public function showAction()
    {

    }

    public function editAction()
    {

    }

    public function newAction()
    {

    }

    public function removeAction()
    {

    }
}
