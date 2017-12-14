<?php
namespace  App\Repositories\Users;
use App\User;

class UserRepository implements  UserRepositoryInterface
{
    public function all()
    {
       return User::all();
    }

    public function save($data)
    {

    }

    public function update($data, $id)
    {

    }

    public function find($id)
    {
        return User::find($id);
    }

    public function findAttribute($attr, $name)
    {
        return User::where($attr, $name)->first();
    }

    public function lockAccount($email)
    {
        $user = $this->findAttribute('email', $email);
        $user->active = 0;
        $user->save();
    }
}

?>