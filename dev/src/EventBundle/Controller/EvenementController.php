<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Contrat;
use EventBundle\Entity\Evenement;
use EventBundle\Form\ContratType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Evenement controller.
 *
 * @Route("evenement")
 */
class EvenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/", name="evenement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('EventBundle:Evenement')->findAll();

        return $this->render('@Event\evenement\index.html.twig', array(
            'evenements' => $evenements,
        ));
    }
    public function readAction()
    {
        $evenements = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('@Event\evenement\add.html.twig', array("evenements" => $evenements));
    }
    public function afficherAction(Request $request,$id)
    {
        $Evenements=$this->getDoctrine()->getRepository(Evenement::class)->findBy(array('id'=>$id));
        $em=$this->getDoctrine()->getManager();
        $Evenement=$this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $em2=$this->getDoctrine()->getRepository(Contrat::class);

        $contrat = new Contrat();
        $nbr=$Evenement->getId();
        $contrat->setEvenement($nbr);
        $em->persist($Evenement);
        $em->flush();

        //prepare the form with function creatform
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            //creat an entity manager object
            $contrat->setEvenement($Evenement);
            //persist the object
            $em->persist($contrat);
            $em->flush();
            return $this->redirectToRoute("read");
        }


        return $this->render("@Event/evenement/add.html.twig", array("Evenements" => $Evenements, 'form'=>$form->createView()));
    }
    public function showadminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('EventBundle:Evenement')->findAll();

        return $this->render('@Event\evenement\show2.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="evenement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('EventBundle\Form\EvenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('showadmin', array('id' => $evenement->getId()));
        }
        return $this->render('@Event/evenement/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="evenement_show")
     * @Method("GET")
     */
    public function showAction(Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('@Event/evenement/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('EventBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('showadmin', array('id' => $evenement->getId()));
        }

        return $this->render('@Event/evenement/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository(Evenement::class)->find($id);

        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('showadmin');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
