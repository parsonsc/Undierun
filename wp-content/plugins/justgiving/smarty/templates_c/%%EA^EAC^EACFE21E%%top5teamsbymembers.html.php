<?php /* Smarty version 2.6.28, created on 2014-09-17 09:11:41
         compiled from top5teamsbymembers.html */ ?>
<table class="top5teams"> 
    <thead> 
        <tr> 
            <th colspan="2" class="top5Title"><span>Simply the best: today&rsquo;s top 5 teams</span></th>  
        </tr> 
    </thead> 
    <tbody>
<?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
        <tr>
            <td class="teamname"><?php echo $this->_tpl_vars['v']['teamname']; ?>
</td>
            <td class="members"><?php if ($this->_tpl_vars['v']['numMembers'] > 0): ?><?php echo $this->_tpl_vars['v']['numMembers']; ?>
<?php else: ?>0<?php endif; ?> <?php if ($this->_tpl_vars['v']['numMembers'] == 1): ?><?php else: ?><?php endif; ?></td>
        </tr>
<?php endforeach; endif; unset($_from); ?> 
    </tbody> 
</table>                        