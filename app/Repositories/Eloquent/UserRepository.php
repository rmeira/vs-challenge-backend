<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepository implements UserRepositoryInterface
{
    /**
     * user model
     *
     * @var User
     */
    protected $user;

    /**
     * user repository constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Return all user's
     *
     * @return object
     */
    public function all()
    {
        return QueryBuilder::for($this->user)
            ->allowedFilters($this->user->getFillable())
            ->allowedFields($this->user->getFillable())
            ->allowedSorts($this->user->getFillable())
            ->allowedIncludes($this->user->getRelations())
            ->paginate()
            ->appends(request()->query());
    }

    /**
     * Find a user than return
     *
     * @param int $id
     * @return object
     */
    public function find($id)
    {
        return QueryBuilder::for($this->user)
            ->allowedFields($this->user->getFillable())
            ->allowedIncludes($this->user->getRelations())
            ->findOrFail($id);
    }

    /**
     * Create a resource
     * @param array $data
     * @return mixed|object
     */
    public function create(array $data)
    {
        $user = new $this->user;
        $user->fill($data);
        $user->save();

        return $user;
    }

    /**
     * Create a new user
     *
     * @param array $data
     * @return object
     */
    public function update($id, array $data)
    {
        $user = $this->user->findOrFail($id);
        $user->fill($data);
        $user->save();

        return $user;
    }

    /**
     * Delete a resource
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->user->findOrFail($id)->delete();
    }
}
