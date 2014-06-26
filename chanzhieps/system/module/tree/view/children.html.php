<form method='post' class='form-horizontal' id='childForm' action="<?php echo $this->inlink('children', "type=$type&category=$parent");?>">
  <div class='panel'>
    <div class='panel-heading'>
    <strong><?php echo $parent ? $lang->category->children . ' <i class="icon-double-angle-right"></i> ' : $lang->category->common; ?></strong>
    <?php
    foreach($origins as $origin)
    {
        echo html::a($this->inlink('browse', "type=$type&category=$origin->id"), $origin->name . " <i class='icon-angle-right text-muted'></i> ");
    }
    ?>
    </div>

    <div class='panel-body'>
      <?php
      $maxOrder = 0;
      foreach($children as $child)
      {
          if($child->order > $maxOrder) $maxOrder = $child->order;
          echo "<div class='form-group'>";
          echo "<div class='col-xs-6 col-md-4 col-md-offset-2'>" . html::input("children[$child->id]", $child->name, "class='form-control'") . "</div>";
          if(!$isWechatMenu) echo "<div class='col-xs-6 col-md-4'>" . html::input("alias[$child->id]", $child->alias, "class='form-control' placeholder='{$this->lang->category->alias}'") . '</div>';
          echo "</div>";
          echo html::hidden("mode[$child->id]", 'update');
      }

      $newChildrenCount = tree::NEW_CHILD_COUNT;
      if($isWechatMenu)
      {
            $allowedChildren = $parent ?  tree::WEICHAT_SUBMENU_COUNT : tree::WEICHAT_MAINMENU_COUNT;
            $newChildrenCount = $allowedChildren - count($children);
      }
        
      for($i = 0; $i < $newChildrenCount; $i ++)
      {
          echo "<div class='form-group'>";
          echo "<div class='col-xs-6 col-md-4 col-md-offset-2'>" . html::input("children[]", '', "class='form-control' placeholder='{$this->lang->category->name}'") . "</div>";
          if(!$isWechatMenu) echo "<div class='col-xs-6 col-md-4'>" . html::input("alias[]", '', "class='form-control' placeholder='{$this->lang->category->alias}'") . '</div>';
          echo "</div>";
          echo html::hidden('mode[]', 'new');
      }

      if(empty($children) and $type == 'forum')
      {
          echo "<div class='form-group'><div class='col-xs-8 col-md-offset-2'><div class='alert alert-warning'>{$this->lang->board->placeholder->setChildren}</div></div></div>";
      }
      echo "<div class='form-group'><div class='col-xs-8 col-md-offset-2'>" . html::submitButton() . "</div></div>";

      echo html::hidden('parent',   $parent);
      echo html::hidden('maxOrder', $maxOrder);
      ?>      
    </div>
  </div>
</form>
<?php if(isset($pageJS)) js::execute($pageJS);?>
