<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Sponsor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sponsor controller.
 *
 * @Route("sponsor")
 */
class SponsorController extends Controller
{
    /**
     * Lists all sponsor entities.
     *
     * @Route("/", name="sponsor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sponsors = $em->getRepository('EventBundle:Sponsor')->findAll();

        return $this->render('@Event\sponsor\index.html.twig', array(
            'sponsors' => $sponsors,
        ));
    }

    /**
     * Creates a new sponsor entity.
     *
     * @Route("/new", name="sponsor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sponsor = new Sponsor();
        $form = $this->createForm('EventBundle\Form\SponsorType', $sponsor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sponsor);
            $em->flush();

            return $this->redirectToRoute('sponsor_index', array('id' => $sponsor->getId()));
        }

        return $this->render('@Event\sponsor\new.html.twig', array(
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sponsor entity.
     *
     * @Route("/{id}", name="sponsor_show")
     * @Method("GET")
     */
    public function showAction(Sponsor $sponsor)
    {
        $deleteForm = $this->createDeleteForm($sponsor);

        return $this->render('@Event\sponsor\index.html.twig', array(
            'sponsor' => $sponsor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sponsor entity.
     *
     * @Route("/{id}/edit", name="sponsor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sponsor $sponsor)
    {
        $deleteForm = $this->createDeleteForm($sponsor);
        $editForm = $this->createForm('EventBundle\Form\SponsorType', $sponsor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sponsor_index', array('id' => $sponsor->getId()));
        }

        return $this->render('@Event\sponsor\edit.html.twig', array(
            'sponsor' => $sponsor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deletesponorAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sponsor = $em->getRepository(Sponsor::class)->find($id);
        $em->remove($sponsor);
        $em->flush();
        return $this->redirectToRoute('sponsor_index');
    }


    /**
     * Creates a form to delete a sponsor entity.
     *
     * @param Sponsor $sponsor The sponsor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sponsor $sponsor)
    {
        return $this->createFormBuilder()
            ->setAction($this->redirectToRoute('deletesponor', array('id' => $sponsor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
