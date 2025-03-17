<?php
class UserModel
{
    use Database;

    public function getAllUser()
    {
        $rs = $this->table('user')->getAll();
        return $rs;
    }
    public function getUserByUsername($username)
    {
        $rs = $this->table('user')
            ->getOne("username", "$username");
        if ($rs == null) {
            return null;
        }
        return $rs;
    }
    public function getUserById($user_id)
    {
        $rs = $this->table('user')
            ->getOne("id", "$user_id");
        if ($rs == null) {
            return null;
        }
        return $rs;
    }
    public function updateUserById($user_id, $name, $address, $phone_number)
    {
        $rs = $this->table("user")
            ->update('id', $user_id, [
                'name' => $name,
                'address' => $address,
                'phone_number' => $phone_number
            ]);
        return $rs;
    }
    public function updateUserPasswordById($user_id, $password)
    {
        $rs = $this->table("user")
            ->update('id', $user_id, [
                'password' => $password
            ]);
        return $rs;
    }
    public function deleteUserById($user_id)
    {
        $rs = $this->table("user")
            ->delete(['id', $user_id]);
        return $rs;
    }

    public function createNewUser($username, $password)
    {
        $rs = $this->table("user")
            ->insert([
                "username" => $username,
                "password" => $password
            ]);
    }
    public function addUser($username, $password, $role, $name, $date_of_birth, $gender, $address, $phone_number)
    {
        $rs = $this->table('user')
            ->insert([
                'username' => $username,
                'password' => $password,
                'role' => $role,
                'name' => $name,
                'date_of_birth' => $date_of_birth,
                'gender' => $gender,
                'address' => $address,
                'phone_number' => $phone_number,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        return $rs;
    }

    public function updateUser($id, $username, $role, $name, $date_of_birth, $gender, $address, $phone_number, $password = null)
    {
        $data = [
            'username' => $username,
            'role' => $role,
            'name' => $name,
            'date_of_birth' => $date_of_birth,
            'gender' => $gender,
            'address' => $address,
            'phone_number' => $phone_number
        ];
        if ($password) {
            $data['password'] = $password;
        }
        $rs = $this->table('user')
            ->update('id', $id, $data);
        return $rs;
    }

    public function deleteUser($user_id)
    {
        $rs = $this->table("user")
            ->delete(['id' => $user_id]);
        return $rs;
    }

    public function getGenderStr($gender)
    {
        return $gender == 0 ? 'Nữ' : 'Nam';
    }

    public function getRoleStr($role)
    {
        switch ($role) {
            case 'admin':
                return 'Quản trị viên';
            case 'staff':
                return 'Nhân viên';
            case 'customer':
                return 'Khách hàng';
            default:
                return 'Không xác định';
        }
    }
}
