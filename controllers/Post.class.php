<?php class Post extends Controller
{

    public function index()
    {
        $postModel = $this->loadModel('PostModel');

        $posts = $postModel->getAll();

        $this->loadView('posts', ['posts' => $posts]);
    }

    public function create_form()
    {
        $this->loadView('insert_post');
    }

    public function create_process()
    {
        $postModel = $this->loadModel('PostModel');
        $title = $_POST['title'];
        $content = $_POST['content'];

        $postModel->insert($title, $content);
        header('Location: ?c=Post');
    }
    
    public function delete()
    {
        $id = $_POST['id'];
        $postModel = $this->loadModel('PostModel');

        $postModel->delete($id);
        header('Location: ?c=Post');
    }

    public function create()
    {
        $postModel = $this->loadModel('PostModel');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $postModel->insert($title, $content);

            header('Location: ?c=Post');
        } else {
            $this->loadView('insert_post');
        }
    }

    public function edit()
    {
        $postModel = $this->loadModel('PostModel');

        $id = $_GET['id'];

        $post = $postModel->getById($id);

        $this->loadView('edit_post', ['post' => $post]);
    }

    public function edit_process()
    {
        $postModel = $this->loadModel('PostModel');

        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $postModel->update($id, $title, $content);

        header('Location: ?c=Post');
    }
}
