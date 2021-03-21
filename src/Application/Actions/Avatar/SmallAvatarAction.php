<?php

namespace App\Application\Actions\Avatar;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class SmallAvatarAction extends Action
{
    protected function action(): Response
    {
        $avatarId = $this->resolveArg("id");
        $file = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/avatar/small/$avatarId.png";
        if (!file_exists($file)) {
            die("file:$file");
        }
        $image = file_get_contents($file);
        if ($image === false) {
            die("error getting image");
        }
        $this->response->getBody()->write($image);
        $this->response->withAddedHeader('Content-Type', 'image/png');
        return $this->response;
    }
}
