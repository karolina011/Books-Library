<?php


class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function loginView()
    {
        $this->view->render('auth/login');
    }

    public function login()
    {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password1'] = $_POST['password1'];

        $userLoginValidator = new UserLoginValidator();


        if (!$userLoginValidator->isLoginDataExist($data))
        {
            header('Location: '.URL. 'Auth/loginView');
        }

//        $loginModel = new Auth_Model();

        $result = $this->model ->run($data);
        if ($result)
        {
            Session::set('loggedIn', true);
            header("Location: " . URL . "Index");
        }
        else
        {
            $_SESSION['errLogin'] = "Nieprawidłowy login lub hasło";
            header("Location: " . URL . "Auth/loginView");
        }

    }

    public function registerView()
    {
        $this->view->render('auth/register');
    }

    public function register()
    {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password1'] = $_POST['password1'];
        $data['password2'] = $_POST['password2'];
        $data['email'] = $_POST['email'];
        $data['accept'] = $_POST['accept'];
        $data['gender'] = $_POST['gender'];
        $data['role'] = 'user';


        $blad = false;

        $genderOk = false;

        $genders = array(
            'male','female'
        );

        if ($data['gender'])
        {
            for ( $i=0; $i<count($genders); $i++)
            {
                if ($data['gender'] == $genders[$i])
                {
                    $genderOk = true;
                }
            }
            if ($genderOk == false)
            {
                $blad = true;
                $_SESSION['errGender'] = "Podana płeć jest niezgodna";
            }

        }
        else
        {
            $blad = true;
            $_SESSION['errGender'] = "Wybierz płeć!";
        }


        $loginValidator = new LoginValidator();

        $result = $loginValidator->validate($data['login']);
        if (is_string($result))
        {
            $_SESSION['errLogin'] = "Login musi składać się tylko z liter i cyfr (bez polskich znaków)";
            $blad = true;
        }

        $lengthValidator = new LengthValidator(6, 25);

        $result = $lengthValidator->validate($data['login']);
        if(is_string($result)) {
            $_SESSION['errLogin'] = "Login powinien zawierać od 6 do 25 znaków";
            $blad = true;
        }

//        $registerModel = new Register_Model();

        $result = $this->model->isLoginExistInDatabase($data['login']);
        if (is_string($result))
        {
            $_SESSION['errLogin'] = "Podany login jest zajęty. Podaj inny.";
            $blad = true;
        }

        $passwordValidator = new PasswordValidator;

        $result = $passwordValidator->validate($data['password1'], $data['password2']);
        if(is_string($result)) {
            $_SESSION['errPassword'] = "Hasła nie są takie same";
            $blad = true;
        }

        $lengthValidator = new LengthValidator(8, 20);

        $result = $lengthValidator->validate($data['password1']);
        if(is_string($result)) {
            $_SESSION['errPassword'] = "Hasło powinno zawierać od 8 do 20 znaków";
            $blad = true;
        }

//        $result3 = $passwordValidator->hashPassword($result1, $result2);
//        if(is_string($result3))
//        {
//            $_SESSION['hasloHash'] = password_hash($data['password1'], PASSWORD_DEFAULT);
//        }


        $emailValidator = new EmailValidator();

        $result = $emailValidator->validate($data['email']);
        if (is_string($result))
        {
            $_SESSION['errEmail'] = "Nieprawidłowy adres email";
            $blad = true;
        }

        $checkboxValidator = new CheckboxValidator();
        $result = $checkboxValidator->validate($data['accept']);
        if (is_string($result))
        {
            $_SESSION['errAccept'] = "Konieczna akceptacja regulaminu";
            $blad = true;
        }

        if($blad)
        {
            $_SESSION['registerData'] = $data;
            header("Location: " . URL . "Auth/registerView");
            exit();
        }

        $result = $this->model->create($data);
        if($result)
        {
//            Session::set('registerSuccess',true);
            header("Location: " . URL . "Auth/registerSuccess");        }
    }

    public function registerSuccess()
    {
        $this->view->render('auth/registerSuccess');
    }

    public function logout()
    {
        session_unset();
        header('Location: '.URL.'Index');
    }
}