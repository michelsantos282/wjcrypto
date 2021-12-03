<?php


namespace App\Api\Repositories\Implementations;

use App\Api\Models\User;
use App\Api\Repositories\IUsersRepository;
use Helper;

class UsersRepository implements IUsersRepository
{

    private User $user;

    public function __construct()
    {
        $this->user = Helper::getContainer("User");
    }

    /**
     * Encrypt data and store in database
     * @param array $validatedData
     */
    public function create(array $validatedData)
    {

         $this->user->setName(Helper::encrypt_data($validatedData["name"]));
         $this->user->setAccNumber(Helper::encrypt_data($validatedData["acc_number"]));
         $this->user->setPassword(password_hash($validatedData["password"],  PASSWORD_ARGON2I));
         $this->user->setDob(Helper::encrypt_data($validatedData["dob"]));
         $this->user->setPhone(Helper::encrypt_data($validatedData["phone"]));
         $this->user->setDocNumber(Helper::encrypt_data($validatedData["doc_number"]));
         $this->user->setBalance(0);

         $userData = [
             "acc_number" => $this->user->getAccNumber(),
             "password" => $this->user->getPassword(),
             "name" => $this->user->getName(),
             "dob" => $this->user->getDob(),
             "phone" => $this->user->getPhone(),
             "doc_number" => $this->user->getDocNumber(),
             "balance" => $this->user->getBalance()
         ];

        $this->user->insertData($userData);

        return $userData["acc_number"];
    }

    /**
     * Returns an array with all users
     * @return array
     */
    public function getAll(): array
    {
        $users = $this->user->selectAllData("user");

        return $users;
    }

    /**
     * Search data from any column
     *
     * @param string $column
     * @param string $value
     * @return mixed|null
     */
    public function searchDataFrom(string $column, string $value)
    {
        $user = $this->user->selectDataFrom($column, Helper::encrypt_data($value));

        if($user) {
            return $user[0];
        }
        return null;
    }

    /**
     * Sets token to user
     *
     * @param string $token
     * @param string $accNumber
     * @return string
     */
    public function createToken(string $token, string $accNumber)
    {
        $this->user->setAuthenticationToken($token);

        $token = $this->user->getAuthenticationToken();

        $data = ['auth_token' => $token];

        if(isset($token)) {
            $this->user->updateData($data, 'acc_number',$accNumber);

            return $token;
        }
    }


    public function update(string $accNumber, array $data)
    {
    }

    public function delete(int $accNumber)
    {
    }
}
