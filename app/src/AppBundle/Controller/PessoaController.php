<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pessoa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pessoa controller.
 *
 * @Route("pessoa")
 */
class PessoaController extends Controller
{
    /**
     * Lists all pessoa entities.
     *
     * @Route("/", name="pessoa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pessoas = $em->getRepository('AppBundle:Pessoa')->findAll();

        return $this->render('pessoa/index.html.twig', array(
            'pessoas' => $pessoas,
        ));
    }

    /**
     * Creates a new pessoa entity.
     *
     * @Route("/new", name="pessoa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pessoa = new Pessoa();
        $form = $this->createForm('AppBundle\Form\PessoaType', $pessoa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pessoa);
            $em->flush();

            return $this->redirectToRoute('pessoa_show', array('id' => $pessoa->getId()));
        }

        return $this->render('pessoa/new.html.twig', array(
            'pessoa' => $pessoa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pessoa entity.
     *
     * @Route("/{id}", name="pessoa_show")
     * @Method("GET")
     */
    public function showAction(Pessoa $pessoa)
    {
        $deleteForm = $this->createDeleteForm($pessoa);

        return $this->render('pessoa/show.html.twig', array(
            'pessoa' => $pessoa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pessoa entity.
     *
     * @Route("/{id}/edit", name="pessoa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pessoa $pessoa)
    {
        $deleteForm = $this->createDeleteForm($pessoa);
        $editForm = $this->createForm('AppBundle\Form\PessoaType', $pessoa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pessoa_edit', array('id' => $pessoa->getId()));
        }

        return $this->render('pessoa/edit.html.twig', array(
            'pessoa' => $pessoa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pessoa entity.
     *
     * @Route("/{id}", name="pessoa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pessoa $pessoa)
    {
        $form = $this->createDeleteForm($pessoa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pessoa);
            $em->flush();
        }

        return $this->redirectToRoute('pessoa_index');
    }

    /**
     * Creates a form to delete a pessoa entity.
     *
     * @param Pessoa $pessoa The pessoa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pessoa $pessoa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pessoa_delete', array('id' => $pessoa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
