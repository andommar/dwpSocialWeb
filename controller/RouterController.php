<?php
class RouterController {
    public function routerRedirect($request) {
        $localpath = 'dwpSocialWeb';
        $request = str_replace($localpath, '', $request,);
        $request = trim($request, '/',);
        $params = explode('/', $request);
        $uri = $params [0];

        switch ($uri) {
            case '/':
                $file = 'home';
                $route = '/';
                break;
            case '':
                $file = 'home';
                $route = '/';
                break;
            case 'home':
                $file = 'home';
                $route = '/';
                break;
            case 'admin':
                if(empty($params[1])){
                    $file = 'views/admin/admin-dashboard';
                    $route = 'admin';
                } else if(!empty($params[1]) && $params[1] == 'posts'){
                    $file = 'views/admin/admin-dashboard';
                    $route = 'admin';
                }else if(!empty($params[1]) && $params[1] == 'comments'){
                    $file = 'views/admin/admin-dashboard';
                    $route = 'admin';
                } else if(!empty($params[1]) && $params[1] == 'users'){
                    $file = 'views/admin/admin-dashboard';
                    $route = 'admin';
                } else if(!empty($params[1]) && $params[1] == 'user'){
                    $file = 'views/admin/admin-dashboard';
                    $route = 'admin';
                }else{
                    $file = 'views/home/404';
                    $route = '404';
                }
                break;
            case 'login':
                $file = 'views/home/login';
                $route = 'login';
                break;
            case 'logout':
                if(!empty($params[1]) && $params[1] == 1){
                    $file = 'views/home/login';
                    $route = 'logout';
                } else {
                    $file = 'views/home/404';
                    $route = '404';
                }
                break;
            case 'signup':
                $file = 'views/home/signup';
                $route = 'signup';
                break;
            case 'category_selection':
                $file = 'views/shared/category_selection';
                $route = 'category_selection';
                break;
            default:
                $file = 'views/home/404';
                $route = '404';
                break;
        }

        // if (!empty($params[1]) && !($params[0] == 'admin' || $params[0] == 'logout')){
        //     $file = 'views/home/404';
        //     $route = '404';
        // }

        $r = new RouterModel ($request);
        $r->get($route, $file);
    }


}


?>