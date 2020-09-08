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
        $taskColumn = $this->model->getTaskLimitOne();
        $tasksCount = count($tasks);
        $this->pageData['action'] = $_SERVER['REQUEST_URI'];
        $totalPages = ceil($tasksCount / $this->taskPerPage);
        $pagination = $this->utils->drawPager($tasksCount, $this->taskPerPage);
        $sorts = $this->utils->drawSorts($taskColumn);
        $this->makeProductPager($tasksCount, $totalPages);
        $this->pageData['pagination'] = $pagination;
        $this->pageData['sorts'] = $sorts;
        $this->pageData['tasks'] = $tasks;
        $this->pageData['tasksCount'] = $tasksCount;


        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function edit()
    {
        if ($_SESSION['user']){
            $this->pageData['title'] = "Редактировать";
            $this->pageData['action'] = $_SERVER['REQUEST_URI'];
            $task = $this->model->getTaskOne($_GET['id']);
            if ($_POST) {
                if ($this->model->updateTaskValue($_POST)){
                    echo 'success';
                    return true;
                }else{
                    echo 'error';
                    return false;
                }
            }

            $this->pageData['task'] = $task;


            $this->view->render('/views/form.tpl.php', $this->pageData);
        }else{
            header('HTTP/1.0 403 Forbidden');
        }
    }

    public function create()
    {
        $this->pageData['title'] = "Создать";
        $this->pageData['action'] = $_SERVER['REQUEST_URI'];
        if ($_POST) {
            if ($this->model->setTaskValue($_POST)){
                echo 'success';
                return true;
            }else{
                echo 'error';
                return false;
            }

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
