<?php

class ItemsHelper {

    private $items;

    public function __construct($items) {
      $this->items = $items;
    }

    public function htmlList() {
      return $this->htmlFromArray($this->itemArray());
    }

    private function itemArray() {
      $result = array();
      foreach($this->items as $item) {
        if ($item->parent == 0) {
          $result[$item->name] = $this->itemWithChildren($item);
        }
      }
      return $result;
    }

    private function childrenOf($item) {
      $result = array();
      foreach($this->items as $i) {
        if ($i->parent == $item->id) {
          $result[] = $i;
        }
      }
      return $result;
    }

    private function itemWithChildren($item) {
      $result = array();
      $children = $this->childrenOf($item);
      foreach ($children as $child) {
        $result[$child->name] = $this->itemWithChildren($child);
      }
      return $result;
    }

    private function htmlFromArray($array) {
      $html = '';
      //print_r($this->items->all());
      foreach($array as $k=>$v) {
        $roles = Userrole::where('name','=',$k)->get();
        foreach ($roles as $role) {
          $id = $role->id;
          $parent = $role->parent;
        }
        $html .= '<ul>';
        $html .= '<li style="padding:7px"><a href="' . URL::route('userroles.show',$id) .  '">' . $k . '</a><span class="pull-right">[' . $parent . ']' . "</span></li>";
        if(count($v) > 0) {

          $html .= $this->htmlFromArray($v);
        }
        $html .= "</ul>";
      }
      return $html;
    }
}