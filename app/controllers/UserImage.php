<?php

namespace app\Controllers;

use core\facades\UploadImage;

class UserImage
{
    public function store()
    {
        try {            
            $image = new UploadImage();
            $auth = user();

            $image->make()
                ->resize(400, null, true)
                ->crop(100, 100)
                ->execute();
            
            $info = $image->get_image_info();

            read('photos');
            where('userId', $auth->id);
            $photoUser = execute(isFetchAll:false);

            if ($photoUser) {
                $updatedUser = update(
                    'photos',
                    ['path' => $info['path']],
                    ['userId' => $photoUser->id]
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

                return setMessageAndRedirect('success', 'Photo cadastrada com sucesso!', '/user/edit/profile');
            }

            return setMessageAndRedirect('error', 'Problema ao cadastrar a sua foto!', '/user/edit/profile');
        } catch(\Exception $e) {
            return setMessageAndRedirect('error', $e->getMessage(), '/user/edit/profile');
        }
    }
}
