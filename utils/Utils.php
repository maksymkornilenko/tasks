<?php

class Utils
{

    /**
     * $totalItems - общее количество элементов для отображения
     * $perPage - количество элементов, отображаемых на одной странице
     * $url - количество элементов, отображаемых на одной странице
     */
    public function drawPager($totalItems, $perPage)
    {
        $tempPage = $_GET['page'];
        $pages = ceil($totalItems / $perPage);

        $_GET['page'] = 1;
        $url = http_build_query($_GET);
        $pager = "<nav aria-label='Page navigation'>";
        $pager .= "<ul class='pagination'>";
        $pager .= "<li><a href='/?" . $url . "' aria-label='Previous'>1</a></li>";

        for ($i = 2; $i <= $pages; $i++) {
            $_GET['page'] = $i;
            $url = http_build_query($_GET);
            $pager .= "<li><a href='/?" . $url . "'>" . $i . "</a></li>";
        }
        $pager .= "</ul>";
        $_GET['page'] = $tempPage;
        return $pager;

    }
    public function drawSorts($columns)
    {
        foreach ($columns as $key=>$value){
            $tempSort='';
            if ($key!='text'){
                if (isset($_GET['data-sort'])){
                    $tempSort=$_GET['data-sort'];
                    if ($_GET['data-sort']==$key){
                        $_GET['data-sort']='-'.$key;
                        $url['sort-'.$key] = '/?'.http_build_query($_GET);
                    }else{
                        $_GET['data-sort']=$key;
                        $url['sort-'.$key] = '/?'.http_build_query($_GET);
                    }
                    $_GET['data-sort'] = $tempSort;
                }else{
                    $_GET['data-sort']=$key;
                    $url['sort-'.$key] = '/?'.http_build_query($_GET);
                    unset($_GET['data-sort']);
                }
            }

        }
        return $url;

    }

}
