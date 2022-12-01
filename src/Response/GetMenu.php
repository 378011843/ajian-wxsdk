<?php


namespace Ajian\Wxsdk\Response;


class GetMenu extends Response
{
    /**
     * 菜单是否开启，0代表未开启，1代表开启
     */
    public $is_menu_open;
    /**
     * 菜单信息
     */
    public $selfmenu_info;

    public function init($data)
    {
        if (isset($data['is_menu_open'])){
            $this->is_menu_open = $data['is_menu_open'];
        }
        if (isset($data['selfmenu_info'])){
            $this->selfmenu_info = $data['selfmenu_info'];
        }
    }
}