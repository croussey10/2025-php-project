<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\WalletRepository;

class WalletService
{
    public function __construct(
        private readonly WalletRepository $walletRepository
    )
    {

    }

    public function findWalletsForUser(User $user): array
    {
        return $this->walletRepository->findWalletsForUser($user);
    }
}
