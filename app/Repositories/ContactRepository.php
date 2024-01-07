<?php


namespace App\Repositories;

use App\Models\IMContact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ContactRepository
{
    /**
     * @return Collection|array
     */
    public function all(): Collection|array
    {
        return IMContact::query()->get();
    }

    /**
     * @param $data
     * @return Model|Builder
     */
    public function store($data): Model|Builder
    {
        return IMContact::query()->create($data);
    }

    /**
     * @param $keyword
     * @return Collection|array
     */
    public function search($keyword): Collection|array
    {
        return IMContact::query()->where('name', 'like', "%{$keyword}%")->get();
    }
}
