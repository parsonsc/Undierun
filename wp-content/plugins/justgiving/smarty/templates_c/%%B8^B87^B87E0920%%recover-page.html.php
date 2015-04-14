<?php /* Smarty version 2.6.28, created on 2014-09-04 15:55:20
         compiled from recover-page.html */ ?>
    <h2>I forgot My password :(</h2>
    <p>No Worries. Just give us your email and we'll send it to you.</p>

    <?php if ($this->_tpl_vars['message'] != ''): ?>
    <p class="warning"><?php echo $this->_tpl_vars['message']; ?>
</p>
    <?php endif; ?>
    <form enctype="multipart/form-data" method="post" id="recover_password" class="user-forms" action="<?php echo $this->_tpl_vars['formurl']; ?>
">
        <div class="container login water-bg water-line-top">
            <div class=".col-xs-* col-xs-12">
                <div class="form-item input-row">
                    <label for="username_email">Email address*<span class="error"><?php echo $this->_tpl_vars['errorMark']; ?>
</span></label>
                    <input name="username_email" type="email" id="username_email" value="<?php echo $this->_tpl_vars['username_email']; ?>
" class="input-text" validate="required:true" />
                    
                </div>
                <div class="form-item input-row centered">
                    <button class="button submit siteCTA" title="Get New Password" type="submit" name="recover_password" id="recover_password">
                        Send
                    </button>
                    <input name="action" type="hidden" id="action" value="recover_password" />
                    <?php echo $this->_tpl_vars['nonce']; ?>

                </div>

                <div class="forgot-links">
                    <?php if ($this->_tpl_vars['loginurl'] != ''): ?>
                    <a class="back-home" href="<?php echo $this->_tpl_vars['loginurl']; ?>
">Return to log in page</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
    <?php if ($this->_tpl_vars['message2'] != ''): ?>
        <?php echo $this->_tpl_vars['message2']; ?>

    <?php endif; ?>
    <?php if ($this->_tpl_vars['message3'] != ''): ?>
        <?php echo $this->_tpl_vars['message3']; ?>

    <?php endif; ?>