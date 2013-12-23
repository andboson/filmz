<?php

namespace Andboson\FilmzBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Andboson\FilmzBundle\Entity\Film;
use Andboson\FilmzBundle\Form\FilmType;
use Andboson\FilmzBundle\Entity\Comments;
use Andboson\FilmzBundle\Form\CommentsType;

/**
 * Film controller.
 *
 */
class FilmController extends Controller
{

    /**
     * Lists all Film entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AndbosonFilmzBundle:Film')->findAll();

        return $this->render('AndbosonFilmzBundle:Film:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Lists all Film entities in Category.
     *
     */
    public function showCategoryAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AndbosonFilmzBundle:Film')->findByCategorySlag($slug);
        $category = $em->getRepository('AndbosonFilmzBundle:Category')->findBySlug( $slug );

        return $this->render('AndbosonFilmzBundle:Film:index.html.twig', array(
            'entities' => $entities,
            'category' => $category,
        ));
    }

    /**
     * Lists all Film entities in with this Genre in Category.
     *
     */
    public function showCategoryGenreAction($slug, $gslug)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AndbosonFilmzBundle:Film')->findByCategorySlugAndGenreSlug($slug, $gslug);
        $category = $em->getRepository('AndbosonFilmzBundle:Category')->findBySlug( $slug );

        return $this->render('AndbosonFilmzBundle:Film:index.html.twig', array(
            'entities' => $entities,
            'category' => $category,
        ));
    }

    /**
     * Creates a new Film entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Film();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('films_show', array('id' => $entity->getId())));
        }

        return $this->render('AndbosonFilmzBundle:Film:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Film entity.
    *
    * @param Film $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Film $entity)
    {
        $form = $this->createForm(new FilmType(), $entity, array(
            'action' => $this->generateUrl('films_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
    * Creates a form to create a Comments entity.
    *
    * @param Comments $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateFormComment(Comments $entity, $id = false)
    {

        $form = $this->createForm(new CommentsType(), $entity, array(
            'action' => $this->generateUrl('comment_create', array( 'film_id' => $id )),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Film entity.
     *
     */
    public function newAction()
    {
        $entity = new Film();
        $form   = $this->createCreateForm($entity);

        return $this->render('AndbosonFilmzBundle:Film:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Film entity.
     *
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AndbosonFilmzBundle:Film')->findBySlug($slug);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $comments = $em->getRepository('AndbosonFilmzBundle:Comments')->findFilmId($entity->getId());


        $deleteForm = $this->createDeleteForm($entity->getId());

        $entityComment = new Comments();
        $entityComment->setFilm( $entity );

        $formComment   = $this->createCreateFormComment($entityComment, $entity->getId());


        return $this->render('AndbosonFilmzBundle:Film:show.html.twig', array(
            'entityComment' => $entityComment,
            'formComment' => $formComment->createView(),
            'entity'      => $entity,
            'comments'      => $comments,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Film entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AndbosonFilmzBundle:Film')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AndbosonFilmzBundle:Film:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Film entity.
    *
    * @param Film $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Film $entity)
    {
        $form = $this->createForm(new FilmType(), $entity, array(
            'action' => $this->generateUrl('films_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('slug', 'text', array('label' => 'slug'));
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Film entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AndbosonFilmzBundle:Film')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('films_edit', array('id' => $id)));
        }

        return $this->render('AndbosonFilmzBundle:Film:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Film entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AndbosonFilmzBundle:Film')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Film entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('films'));
    }

    /**
     * Creates a form to delete a Film entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('films_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
