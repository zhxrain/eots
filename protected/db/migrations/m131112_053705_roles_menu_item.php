<?php

Yii::import('application.models.*');
Yii::import('application.models.base.*');

class m131112_053705_roles_menu_item extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('roles_menu_item', array(
      'role_name' => 'varchar(20) NOT NULL',
      'menu_item_id' => 'integer NOT NULL'
    ));

    $auth=Yii::app()->authManager;
    $roles=$auth->getRoles();

    $root_system_config=MenuItem::model()->findByAttributes(array('title'=>"系统配置"));
    $root_network_management=MenuItem::model()->findByAttributes(array('title'=>"网络管理"));
    $root_access_rule=MenuItem::model()->findByAttributes(array('title'=>"访问控制"));
    $root_app_def=MenuItem::model()->findByAttributes(array('title'=>"应用防护"));
    $root_session_management=MenuItem::model()->findByAttributes(array('title'=>"会话管理"));
    $root_protocol_pack=MenuItem::model()->findByAttributes(array('title'=>"协议封装"));
    $root_unify_auth=MenuItem::model()->findByAttributes(array('title'=>"统一认证"));
    $root_monitor=MenuItem::model()->findByAttributes(array('title'=>"状态监控"));
    $root_log=MenuItem::model()->findByAttributes(array('title'=>"日志"));

    foreach($roles as $n=>$role)
    {
      $roleName=$role->getName();
      if($roleName=="Administrators") {
        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_system_config->id));
        $root_system_config_descendants=$root_system_config->descendants()->findAll();
        foreach($root_system_config_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_network_management->id));
        $root_network_management_descendants=$root_network_management->descendants()->findAll();
        foreach($root_network_management_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_access_rule->id));
        $root_access_rule_descendants=$root_access_rule->descendants()->findAll();
        foreach($root_access_rule_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_app_def->id));
        $root_app_def_descendants=$root_app_def->descendants()->findAll();
        foreach($root_app_def_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_session_management->id));
        $root_session_management_descendants=$root_session_management->descendants()->findAll();
        foreach($root_session_management_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_protocol_pack->id));
        $root_protocol_pack_descendants=$root_protocol_pack->descendants()->findAll();
        foreach($root_protocol_pack_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_unify_auth->id));
        $root_unify_auth_descendants=$root_unify_auth->descendants()->findAll();
        foreach($root_unify_auth_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_monitor->id));
        $root_monitor_descendants=$root_monitor->descendants()->findAll();
        foreach($root_monitor_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }

        $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$root_log->id));
        $root_log_descendants=$root_log->descendants()->findAll();
        foreach($root_log_descendants as $descendant)
        {
          $this->insert("roles_menu_item", array('role_name'=>$roleName, 'menu_item_id'=>$descendant->id));
        }
      }
    }
  }

  public function safeDown()
  {
    $this->dropTable('roles_menu_item');
  }
}
