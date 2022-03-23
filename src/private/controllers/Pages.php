<?php

namespace App\Controllers;

use App\Libraries\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        //empty func
    }

    public function index()
    {
        $this->view('pages/index');
    }
    public function admin()
    {
        $users = $this->model('Users')::all();

        // echo $users[0]->email;
        $this->view('pages/admin/dashboard', $users);
    }
    public function login()
    {
        global $settings;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // if ($this->model('Users')::find_by_email($email)) {
            //     echo $email;
            // }
            if (empty($email) || empty($password)) {
                $_SESSION['message'] =  "fill all details";
            } else {
                $row = $this->model('Users')::find_by_email($email);
                // print_r($row);
                if ($row->email == $email && $row->password == $password && $row->role == 'admin' && $row->status == 'approved') {
                    header('Location:' . $settings["siteurl"] . '/pages/admin');
                }
                if ($row->email == $email && $row->password == $password && $row->role == 'user' && $row->status == 'approved') {
                    header('location:' . $settings["siteurl"] . '/pages/user');
                } else {
                    $_SESSION['message'] = "Not approved yet.........";
                }
            }
        }

        $this->view('pages/login/header');
        $this->view('pages/login/main');
        $this->view('pages/login/footer');
    }

    public function register()
    {
        $this->view('pages/listUser');
    }
    public function signup()
    {
        global $settings;
        $postdata = $_POST ?? array();
        if (isset($postdata['firstname']) && isset($postdata['lastname']) && isset($postdata['email']) && isset($postdata['password'])) {
            $users = $this->model('Users');


            if (empty($postdata['firstname']) || empty($postdata['lastname']) || empty($postdata['email']) || empty($postdata['password'])) {
                $_SESSION['message'] = "Fill all the details........";
            } elseif ($this->model('Users')::find_by_email($postdata['email'])) {
                $_SESSION['message'] = "email already exists......";
            } else {
                $users->firstname = $postdata['firstname'];
                $users->lastname = $postdata['lastname'];
                $users->email = $postdata['email'];
                $users->password = $postdata['password'];
                $users->role = "user";
                $users->status = "restricted";
                $users->save();
                header('location:' . $settings['siteurl'] . '/pages/login');
            }
        }
        $data['Users'] = $this->model('Users')::all();
        $this->view('pages/signup/signup', $data);
    }
    // public function blog()
    // {
    //     $this->view('pages/blog/blog');
    // }
    public function status()
    {
        global $settings;
        if (isset($_POST['change'])) {
            if ($this->model('Users')::find_by_email($_POST['email'])) {
                //echo "hiowhd";
                $row = $this->model('Users')::find_by_email($_POST['email']);
                //print_r($row);
                if ($row->status == 'restricted') {
                    $row->status = 'approved';
                    print_r($row->status);
                } else {
                    $row->status = 'restricted';
                }
            }
            $row->save();
            header('location:' . $settings['siteurl'] . '/pages/admin');
        }
        if (isset($_POST['delete'])) {
            if ($this->model('Users')::find_by_email($_POST['email'])) {
                //echo "hiowhd";
                $row = $this->model('Users')::find_by_email($_POST['email']);
                $row->delete();
                header('location:' . $settings['siteurl'] . '/pages/admin');
            }
        }
    }
    public function user()
    {
        $data = $this->model('Posts')::all();
        $this->view('pages/user/blog', $data);
    }
    public function addblog()
    {
        $postdata = $_POST ?? array();
        if (isset($postdata['title']) && isset($postdata['content'])) {
            echo 'dsdfjkhdfhkhs';
            $posts = $this->model('Posts');
            $posts->title = $postdata['title'];
            $posts->content = $postdata['content'];
            $posts->save();
        }
        $data = $this->model('Posts')::all();
        $this->view('pages/addblog', $data);
    }
    public function editblog()
    {
        //$data = "";
        if (isset($_POST['edit'])) {
            // echo $_POST['id'];
            // die();
            $data = $this->model('Posts')::find_by_blog_id($_POST['id']);
        }
        $this->view('pages/editblog', $data);
    }
    public function update()
    {
        global $settings;
        $postdata = $_POST ?? array();
        if (isset($postdata['title']) && $postdata['content']) {
            $posts = $this->model('Posts')::find_by_blog_id($_POST['id']);

            $posts->title = $postdata['title'];
            $posts->content = $postdata['content'];
            $posts->save();
            header('location:' . $settings['siteurl'] . '/pages/user');
        }
        $data = $this->model('Posts')::all();
        $this->view('pages/editblog', $data);
    }
    public function deleteblog()
    {
        global $settings;
        if (isset($_POST['delete'])) {
            if ($this->model('Posts')::find_by_blog_id($_POST['id'])) {
                //echo "hiowhd";
                $row = $this->model('Posts')::find_by_blog_id($_POST['id']);
                $row->delete();
                header('location:' . $settings['siteurl'] . '/pages/adminblog');
            }
        }
    }
    public function adminblog()
    {
        $row = $this->model('Posts')::all();
        $this->view('pages/adminblog', $row);
    }
}
