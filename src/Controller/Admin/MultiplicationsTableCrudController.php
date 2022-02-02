<?php

namespace App\Controller\Admin;

use App\Entity\MultiplicationsTable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MultiplicationsTableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MultiplicationsTable::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'nom'),
            AssociationField::new('operations')
        ];
    }

}
