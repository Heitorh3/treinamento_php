<?php

namespace app\Controllers;

class UserImage
{
    public function store()
    {
        try {
            $path = upload(640, 480, 'assets/images', 'crop');
            $auth = user();

            read('photos');
            where('userId', $auth->id);
            $photoUser = execute(isFetchAll:false);

            if ($photoUser) {
                $updatedUser = update(
                    'photos',
                    ['path' => $path],
                    ['userId' => $photoUser->id]
                );
                @unlink($photoUser->path);
            } else {
                $updatedUser = create('photos', [
                    'userId' => $auth->id,
                    'path' => $path,
                ]);
            }

            $auth->path = $path;

            if ($updatedUser) {
                return setMessageAndRedirect('success', 'Photo cadastrada com sucesso!', '/user/edit/profile');
            }

            return setMessageAndRedirect('error', 'Problema ao cadastrar a sua foto!', '/user/edit/profile');
        } catch(\Exception $e) {
            return setMessageAndRedirect('error', $e->getMessage(), '/user/edit/profile');
        }
    }
}
