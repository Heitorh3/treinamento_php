<?php

namespace app\controllers;

use app\helpers\FlashMessage;
use app\helpers\Redirect;
use core\facades\UploadImage;

class UserImageController extends BaseController
{
    public function store()
    {
        try {
            $image = new UploadImage();
            $auth = \Session::user();

            $image->make()
                ->resize(400, null, true)
                ->fit(400, null, true)
                ->crop(200, 200)
                ->execute();

            $info = $image->get_image_info();

            read('photos');
            where('userId', $auth->id);
            $photoUser = execute(isFetchAll: false);

            if ($photoUser) {
                $updatedUser = update(
                    'photos',
                    [
                        'path' => $info['path'],
                        'updated_At' => date('Y-m-d H:i:s'),
                    ],
                    ['userId' => $photoUser->userId]
                );
                remove_file($photoUser->path);
            } else {
                $updatedUser = create('photos', [
                    'userId' => $auth->id,
                    'path' => $info['path'],
                ]);
            }

            if ($updatedUser) {
                $auth->path = $info['path'];

                FlashMessage::add('image_success', 'Photo cadastrada com sucesso!', 'success');

                return Redirect::redirect('/user/edit/profile');
            }

            FlashMessage::add('image_error', 'Problema ao cadastrar a sua foto!');

            return Redirect::redirect('/user/edit/profile');
        } catch (\Exception $e) {
            FlashMessage::add('image_error', $e->getMessage());

            return Redirect::redirect('/user/edit/profile');
        }
    }
}
