<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Eloquent\Traits\Slugable;
use App\Scopes\PublishedScope;

/**
 * Class CategoryRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class CategoryRepositoryEloquent extends Repository implements CategoryRepository
{
    use Slugable;

    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createCategory(array $attributes)
    {
        $attributes = $this->preHandleData($attributes);

        return $this->create($attributes);
    }

    /**
     * @param array $attributes
     * @return array
     */
    protected function preHandleData(array $attributes)
    {
        $attributes = $this->autoSlug($attributes);

        return $attributes;
    }

    /**
     * @param array $attributes
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function updateCategory(array $attributes, $id)
    {
        $attributes = $this->preHandleData($attributes);

        return $this->update($attributes, $id);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function allWithPostCount($columns = ['*'])
    {
        return $this->withCount([
            'posts' => function ($query) {
                if (isAdmin()) {
                    $query->withoutGlobalScope(PublishedScope::class);
                }
            }
        ])
            ->all()
            ->reject(function ($category) {
                return $category->posts_count == 0;
            });
    }
}
