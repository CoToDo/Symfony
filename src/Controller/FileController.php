<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\ExportModel;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FileController extends Controller
{
    /**
     * @Route("/export", name="file_export")
     */
    public function export()
    {

        $exportModel = new ExportModel();
        $exportModel->exportUser($this->getUser());
        return $this->render('file/index.html.twig', [
            'controller_name' => 'FileController',
        ]);
    }
}