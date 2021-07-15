<?php
//role角色类模型
namespace Home\Model;
use Think\Model;

class RoleModel extends Model{
	public function updateRole ($auth_id_array,$role_id){
		$auth_ids =implode(',', $auth_id_array);//把数组连接成字符串
		$auth = M('auth')->select($auth_ids);//查询Id为这字符串里的数字返回一个数组结果
		$array=array();//定义一个数组
		foreach ($auth as $v) {//第一个参数是要循环的数组
			if (empty($v['auth_c']) ||  empty($v['auth_a'])){
				continue;//进入下一次循环
			}
			$array[] = $v['auth_c'].'-'.$v['auth_a'];//数组存放这个字符串值
		}
		$role_auth_ac =join(',',$array);//把数组连接成字符串
		$data['role_id']=$role_id;//角色主键id
		$data['role_auth_ids']=$auth_ids;
		$data['role_auth_ac']=$role_auth_ac;
		return M('role')->save($data);//默认是主键id,根据主键来保存内容,返回的是影响记录的行数row
	}
}