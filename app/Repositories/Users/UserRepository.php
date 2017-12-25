<?php
namespace  App\Repositories\Users;
use App\User;
use App\Models\UserRole;

class UserRepository implements  UserRepositoryInterface
{
    public function all()
    {
       return User::all();
    }

    public function save($data)
    {
        $user =new User();
        $userRole = new UserRole();
        if(isset($data['name'])){
            $user->name = $data['name'];
        }else{
            $user->name ='';
        }
        if(isset($data['fullname'])){
            $user->fullname = $data['fullname'];
        }else{
            $user->fullname ='';
        }
        if(isset($data['email'])){
            $user->email = $data['email'];
        }else{
            $user->email ='';
        }
        if(isset($data['password'])){
            $user->password = bcrypt($data['password']);
        }else{
            $user->password ='';
        }
        $user->save();
        $userRole->user_id=$user->id;
        $userRole->role_id=2;
        $userRole->save();
    }

    public function update($data, $id)
    {
        $user = User::find($id);
        if($user) {
            if(isset($data['name'])){
                $user->name = $data['name'];
            }else{
                $user->name ='';
            }
            if(isset($data['fullname'])){
                $user->fullname = $data['fullname'];
            }else{
                $user->fullname ='';
            }
            if(isset($data['password']) && ! empty($data['password'])){
                $user->password = bcrypt($data['password']);
            }
            return $user->save();
        } else {
            return false;
        }
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
    public function ListInSearchUser($email, $active, $limit)
    {
        $result = User::select('users.*');
        if($email != '') {
            $result->where(function ($query) use($email){
                $query->where('users.email', 'like', "%$email%")
                ->orWhere('users.name', 'like', "%$email%");
            });
        }
        if($active !=-1) {
            $result->where('users.active', $active);
        }
        return $result->paginate($limit);
    }

    public function lockAndUnlock($id)
    {
        $user = $this->find($id);
        if($user){
            if($user->active == 1) {
                $user->active = 0;
            } else {
                $user->active = 1;
            }
           return $user->save();
        }else{
            return false;
        }
    }
}

?>