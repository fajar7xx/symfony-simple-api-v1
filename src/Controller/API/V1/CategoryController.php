<?php

namespace App\Controller\API\V1;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/categories')]
final class CategoryController extends AbstractController
{
    #[Route(name: 'category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, SerializerInterface $serializer): Response
    {

        $categories = $categoryRepository->findAll();
        $jsonContent = $serializer->serialize($categories, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

//    #[Route('/new', name: 'category_new', methods: ['POST'])]
//    public function new(Request $request, EntityManagerInterface $entityManager): Response
//    {
//        $category = new Category();
//        $form = $this->createForm(CategoryType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->persist($category);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_a_p_i_v1_category_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('api/v1/category/new.html.twig', [
//            'category' => $category,
//            'form' => $form,
//        ]);
//    }

//    public function create(){}

//    TODO: tambahkan validasi jika id yang dicari tidak ada kembalikan 404 not found
    #[Route(
        '/{id<\d+>}',
        name: 'category_show',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function show(Category $category, SerializerInterface $serializer): Response
    {
        $jsonContent = $serializer->serialize($category, 'json');
        return JsonResponse::fromJsonString($jsonContent);
    }

//    #[Route('/{id}/edit', name: 'category_edit', methods: ['PUT', 'PATCH'])]
//    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
//    {
//        $form = $this->createForm(CategoryType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_a_p_i_v1_category_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('api/v1/category/edit.html.twig', [
//            'category' => $category,
//            'form' => $form,
//        ]);
//    }

//    public function update(){}

//    #[Route('/{id}', name: 'category_delete', methods: ['DELETE'])]
//    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->getPayload()->getString('_token'))) {
//            $entityManager->remove($category);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('app_a_p_i_v1_category_index', [], Response::HTTP_SEE_OTHER);
//    }
}
