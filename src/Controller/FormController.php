<?php
// src/AppBundle/Controller/LuckyController.php
namespace App\Controller;
use App\Entity\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityManagerInterface;
class FormController extends Controller
{

    public function numberAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('InvoiceNumber', IntegerType::class)
            ->add('ClientNumber', IntegerType::class)
            ->add('InvoiceDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Send Data'])
            ->getForm();
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();
			$task = $form->getData();
			$Entity = new Invoice();
			$Entity->setDate($task["InvoiceDate"]);
			$Entity->setNumber($task["InvoiceNumber"]);
			$Entity->setClientID($task["ClientNumber"]);
			$entityManager->persist($Entity);
			$entityManager->flush();
			return new Response('Saved new product with id '.$Entity->getId());
		}
        return $this->render('\Form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}