<?php

namespace App\Controller;
use App\Entity\RowInvoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class FormInvoiceController extends Controller
{
    public function from_actionInvoice(Request $request)
    {
		$entityManager = $this->getDoctrine()->getManager();
		$Select_ID = $entityManager->createQuery('SELECT id FROM App:Invoice id');
		$Dati = $Select_ID->getResult();
		$associative_arrayID = array();
		foreach($Dati as $ID){
			$associative_arrayID[$ID->getId()] = $ID->getId();
		}
        $form = $this->createFormBuilder()
            ->add('InvoiceId', ChoiceType::class,[
				'choices' => $associative_arrayID,
			])
            ->add('Description', TextType::class)
            ->add('Quantity', IntegerType::class)
            ->add('Amount', NumberType::class)
            ->add('AmountIva', NumberType::class)
            ->add('TotalWithIva', NumberType::class)
            ->add('save', SubmitType::class, ['label' => 'Send Data'])
            ->getForm();
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$task = $form->getData();
			$Entity = new RowInvoice();
			$Entity->setId_Invoice($task["InvoiceId"]);
			$Entity->setDescription($task["Description"]);
			$Entity->setQuantity($task["Quantity"]);
			$Entity->setamounts($task["Amount"]);
			$Entity->setIVAamounts($task["AmountIva"]);
			$Entity->setTotalamounts($task["TotalWithIva"]);
			$entityManager->persist($Entity);
			$entityManager->flush();
			return new Response('Saved new product with id '.$Entity->getId());
		}
        return $this->render('\Form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
