<?php

namespace App\Controller\Admin;

use App\Entity\Result;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ResultCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Result::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('result')
        ];
    }
    
}
