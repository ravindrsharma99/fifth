<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Seo extends CI_Controller {

    function sitemap()
    {
        $this->load->model('blog_model');
        $data['items'] = $this->blog_model->GetBlog(array(),'slug, created_on, tags');
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }
} 
