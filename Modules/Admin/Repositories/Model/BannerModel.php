<?php

namespace Modules\Admin\Repositories\Model;

use Modules\Admin\Repositories\BannerRepositoryInterface;
use App\Contracts\BannerContracts;
use App\Contracts\DecryptContracts;
use Modules\Admin\Repositories\Model\Entities\Banner;

class BannerModel implements BannerRepositoryInterface
{
    use BannerContracts, DecryptContracts;

    public function getAll()
    {
        $banner = Banner::orderBy('created_at', 'desc');
        return $banner->get();
    }

    public function create($request)
    {
        $banner = new Banner();
        $banner->image = $this->uploadBanner($request);
        $banner->save();
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($this->decrypt(false, $id));
        $banner->delete();
        return $this->deleteBanner($banner->image);
    }
}