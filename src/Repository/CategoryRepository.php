<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getAllCategories(Request $request): Paginator
    {
        $query = $this->createQueryBuilder('category');

        if($searchQuery = $request->get('q')){
            $query->andWhere('category.name LIKE :searchQuery')
                ->orWhere('category.description LIKE :searchQuery')
                ->setParameter('searchQuery', '%'.$searchQuery.'%');
        }

        $orderBy = $request->query->get('order_by', 'id');
        $sortBy = $request->query->get('sort_by', 'ASC');

        $allowOrderByFields = ['id', 'name'];
        if(!in_array($orderBy, $allowOrderByFields)) {
            $orderBy = 'id';
        }

        $sortBy = strtoupper($sortBy);
        if(!in_array($sortBy, ['ASC', 'DESC'])) {
            $sortBy = 'ASC';
        }

        $query->orderBy('category.' . $orderBy, $sortBy)
            ->setFirstResult(($request->get('page') - 1) * $request->get('limit'))
            ->setMaxResults($request->get('limit'))
            ->getQuery();

        return new Paginator($query, true);
//
//        return new Paginator(
//            $this->createQueryBuilder('category')
//                ->setFirstResult(($request->get('page') - 1) * $request->get('limit'))
//                ->setMaxResults($request->get('limit'))
//        );
    }

    //    /**
    //     * @return Category[] Returns an array of Category objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Category
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
