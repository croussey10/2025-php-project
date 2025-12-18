<?php

namespace App\Repository;

use App\Entity\Expense;
use App\Entity\Wallet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Expense>
 */
class ExpenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expense::class);
    }

    public function findExpensesForWallet(Wallet $wallet, int $page, int $limit): array
    {
        return
            $this
                ->createQueryBuilder("e")
                ->innerJoin("e.wallet", "w", conditionType: "WITH", condition: "w.isDeleted = false AND w.id = :wallet")
                ->andWhere("w.isDeleted = false")
                ->orderBy("e.createdDate", "DESC")
                ->setMaxResults($limit)
                ->setFirstResult(($page - 1) * $limit)
                ->setParameter("walletId", $wallet->getId())
                ->getQuery()
                ->getResult();
    }
}
