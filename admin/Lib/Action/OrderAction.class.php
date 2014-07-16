<?php
	class OrderAction extends CommonAction{
		public function order_index(){
			//列表过滤器，生成查询Map对象
			$map = $this->_search();
			$name=$this->getActionName();
			$model = D ($name);
			if (! empty ( $model )) {
				$this->_list ( $model, $map );
			}
			$this->display();
		}
	}
?>