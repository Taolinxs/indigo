<?php

namespace App\Repositories\Eloquent;

use App\Models\Setting;
use App\Repositories\Contracts\SettingRepository;
use App\Http\Resources\Setting as SettingResource;

/**
 * Class SettingRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class SettingRepositoryEloquent extends BaseRepository implements SettingRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Setting::class;
    }

    /**
     * @return null|string
     */
    public function resource()
    {
        return SettingResource::class;
    }

    /**
     * @param null $tag
     * @return array|mixed
     */
    public function siteSettings($tag = null)
    {
        if (method_exists($this->model, $method = 'formatData')) {
            return call_user_func_array([$this->model, $method], [$tag]);
        }

        return [];
    }
}
