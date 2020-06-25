<?php
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : jenaye@protonmail.com
 * Date: 25/06/2020
 * Time: 22.27
 */

namespace App\Controller;

use App\Entity\Document;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CreateMediaObjectAction
{
    public function __invoke(Request $request): Document
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $mediaObject = new Document();
        $mediaObject->file = $uploadedFile;

        return $mediaObject;
    }
}
