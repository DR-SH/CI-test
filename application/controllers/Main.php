<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Контроллер Main
 */
class Main extends CI_Controller {
    
    /**
     * Конструктор контроллера Main.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Links_model');
        $this->load->helper(array('form', 'url'));
    }

    /**
     * Метод выводит форму для вставки длинной ссылки.
     * В случае успешного ввода выводит короткую ссылку.
     *
     * @return void
     */
    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('link',
            'Link',
            'callback_validate_url',
            ['callback_validate_url' => 'Введен некорректный URL']);
        
        if ($this->form_validation->run() == false)
        {
            $this->load->view('form');
        }
        else
        {
            $data['longLink'] = $this->input->post('link');
            $data['shortLink'] =  $this->Links_model->insert_link($data['longLink']);
            ($data['shortLink']) ? $this->load->view('formsuccess', $data) : show_error('Произошла ошибка');
        }
    }

    /**
     * Перенаправление по короткой ссылке
     *
     * @param string
     * return redirect
     */
    public function redirect($link)
    {
        $url = $this->Links_model->select_link($link);
        ($url)? redirect($url) : show_404();
    }

    /**
     * Кастомный метод для валидации URL
     *
     * @param    string
     * @return    bool true, если валидация прошла успешно
     */
    public function validate_url($url)
    {
        $pat = '/^(https?:\/\/)?([\w\.]+)\.([a-z]{2,6}\.?)(\/[\S]*)*\/?$/i';
        if (!preg_match($pat, $url))
        {
            $this->form_validation->set_message('validate_url', 'Укажите корректный URL');
            return false;
        }
        return true;
    }

}
