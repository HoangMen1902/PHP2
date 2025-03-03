<?php
namespace Src\Controllers\Client;

use Src\Controllers\BaseController;
use Src\Models\Client\ProductModel;

class HomeController extends BaseController {
    public function loadHome() {
        $ProductModel = new ProductModel();
        $data = $ProductModel->findRandomProducts(4); 
        $data2 = $ProductModel->findRandomProducts(4); 
        $data3 = $ProductModel->findRandomProducts(4); 
        $data4 = $ProductModel->findRandomProducts(4); 
    
        echo $this->view->render('/Client/Home', ['data' => $data, 'data2' => $data2, 'data3' => $data3, 'data4' => $data4]);
    }

    public function loadContact() {
        echo $this->view->render('/Client/Pages/Contact');
    }
    public function loadAbout() {
        echo $this->view->render('/Client/Pages/About');
    }
}