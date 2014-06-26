<?php include '../../common/view/header.html.php';?>
<div class='page-user-control'>
  <div class='row'>
    <?php include './side.html.php';?>
    <div class='col-md-10'>
      <div class='panel'>
        <div class='panel-heading'><strong><i class='icon-user'></i> <?php echo $lang->user->profile;?></strong></div>
        <div class='panel-body'>
          <dl class='dl-horizontal'>
            <dt><?php echo $lang->user->realname;?></dt>
            <dd><?php echo $user->realname;?></dd>
            <dt><?php echo $lang->user->email;?></dt>
            <dd><?php echo $user->email;?></dd>
            <dt><?php echo $lang->user->company;?></dt>
            <dd><?php echo $user->company;?></dd>
            <dt><?php echo $lang->user->address;?></dt>
            <dd><?php echo $user->address;?></dd>
            <dt><?php echo $lang->user->zipcode;?></dt>
            <dd><?php echo $user->zipcode;?></dd>
            <dt><?php echo $lang->user->mobile;?></dt>
            <dd><?php echo $user->mobile;?></dd>
            <dt><?php echo $lang->user->phone;?></dt>
            <dd><?php echo $user->phone;?></dd>
            <dt><?php echo $lang->user->qq;?></dt>
            <dd><?php echo $user->qq;?></dd>
            <dt><?php echo $lang->user->gtalk;?></dt>
            <dd><?php echo $user->gtalk;?></dd>
            <dt></dt>
            <dd><?php echo html::a(inlink('edit'), "<i class='icon-pencil'></i> " . $lang->user->editProfile, "class='btn btn-primary'");?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
