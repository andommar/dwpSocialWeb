<?php
class RouterController {
    public function routerRedirect($request) {
        $localpath = 'dwpSocialWeb';
        $request = str_replace($localpath, '', $request,);
        $request = trim($request, '/',);

        switch ($request) {
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
                $file = 'views/admin/admin-dashboard';
                $route = 'admin';
                break;
            case 'admin/posts':
                $file = 'views/admin/adminPostsDashboard';
                $route = 'admin/posts';
                break;
            case 'login':
                $file = 'views/home/login';
                $route = 'login';
                break;
            case 'logout/1':
                $file = 'views/home/login';
                $route = 'logout';
                break;
            case 'signup':
                $file = 'views/home/signup';
                $route = 'signup';
                break;
            case 'category_selection':
                $file = 'views/shared/category_selection';
                $route = 'category_selection';
                break;
            // case '':
            //     $file = 'views/admin/admin-dashboard';
            //     $route = 'admin';
            //     break;
            default:
                $file = 'views/home/404';
                $route = '404';
                break;
        }
        $r = new RouterModel ($request);
        $r->get($route, $file);
    }
}


?>