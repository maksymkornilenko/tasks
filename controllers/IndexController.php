<?php

class IndexController extends Controller
{

    private $pageTpl = "/views/cabinet.tpl.php";
    private $taskPerPage = 3;

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
        $this->utils = new Utils();
    }

    public function index()
    {

        $this->pageData['title'] = "Кабинет";

        $tasks = $this->model->getTasks();
        $tasksCount = count($tasks);
        $this->pageData['action'] = $_SERVER['REQUEST_URI'];
        $totalPages = ceil($tasksCount / $this->taskPerPage);
        $pagination = $this->utils->drawPager($tasksCount, $this->taskPerPage);
        $this->makeProductPager($tasksCount, $totalPages);
        $this->pageData['pagination'] = $pagination;
        $this->pageData['tasks'] = $tasks;
        $this->pageData['tasksCount'] = $tasksCount;


        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function edit()
    {
        $this->pageData['title'] = "Редактировать";
        $this->pageData['action'] = $_SERVER['REQUEST_URI'];
        $task = $this->model->getTaskOne($_GET['id']);
        if ($_POST) {
            $this->model->updateTaskValue($_POST);
            header("Location: /");
        }
        $this->pageData['task'] = $task;


        $this->view->render('/views/form.tpl.php', $this->pageData);
    }

    public function create()
    {
        $this->pageData['title'] = "Создать";
        $this->pageData['action'] = $_SERVER['REQUEST_URI'];
        if ($_POST) {
            $this->model->setTaskValue($_POST);
            header("Location: /");
        }


        $this->view->render('/views/form.tpl.php', $this->pageData);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }

    public function makeProductPager($allProducts, $totalPages)
    {

        if (!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = $this->taskPerPage;
        } elseif (intval($_GET['page']) > $totalPages || intval($_GET['page']) == $totalPages) {
            $pageNumber = $totalPages;
            $leftLimit = $this->taskPerPage * ($pageNumber - 1);
            $rightLimit = $allProducts;
        } else {
            $pageNumber = intval($_GET['page']);
            $leftLimit = $this->taskPerPage * ($pageNumber - 1);
            $rightLimit = $this->taskPerPage;
        }

        $this->pageData['tasksOnPage'] = $this->model->getLimitTasks($leftLimit, $rightLimit);

    }

}
