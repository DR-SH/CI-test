<?php

/**
 * Модель Links_model
 */
class Links_model extends CI_Model {

    /**
     *  Конструктор Links_model.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Вставка значений в базу данных.
     * 
     * @param string
     * @return mixed: string, если запись прошла успешно, или 0, если нет
     */
    public function insert_link($link)
    {
        $shortLink = $this->makeShortLink(7);
        if ($this->db->insert('links', ['short_link' => $shortLink, 'url' => $link]))
        {
            return $shortLink;
        }
        return 0;    
    }

    /**
     * Поиск значений в базе данных.
     *
     * @param string
     * @return mixed: string, если запись в БД существует, или 0, если нет
     */
    public function select_link($link)
    {
        $query = $this->db->select('url')->where('short_link', $link)->get('links')->result_array();
        return  (!empty($query))? $query[0]['url'] : 0 ;
    }

    /**
     * Генерация набора случайных символов.
     *
     * @param int
     * @return string
     */
    private function makeShortLink($count)
    {
        $result = '';
        $array = array_merge(range('a','z'), range('0','9'));
        for($i = 0; $i < $count; $i++){
            $result .= $array[mt_rand(0, 35)];
        }
        return $result;
    }
}