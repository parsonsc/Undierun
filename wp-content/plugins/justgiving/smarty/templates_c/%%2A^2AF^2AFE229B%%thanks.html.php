<?php /* Smarty version 2.6.28, created on 2014-09-17 11:08:42
         compiled from thanks.html */ ?>
<div class="thank_you_inner">
    <h2>Thank You</h2>
    <p>You&rsquo;ve joined the &ldquo;<?php echo $this->_tpl_vars['team']['name']; ?>
&rdquo; team and your JustGiving page 
    is ready to raise some money. (A confirmation email is on its way).</p>
    <p>One last thing. Visit your page now and complete your registration by making a suggested 
    donation of &pound;5. </p>

    <div class="regCTA siteCTA">
        <a href="<?php echo $this->_tpl_vars['user']['donationurl']; ?>
" class="completeReg">Complete your registration</a>
    </div>
    <div class="thanksUnderline"></div>

    <p>Sharing is caring. Spread the word and raise more money.</p>
    <?php if ($this->_tpl_vars['settings']['fbappid'] != ''): ?>
    <script type="application/javascript">
      window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '<?php echo $this->_tpl_vars['settings']['fbappid']; ?>
',                            
          status     : true,                                 
          xfbml      : true                                  
        });
      };
      // Load the SDK asynchronously
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
       
    function FBShareOp(){
    	var product_name   = 	'Undie Run';
    	var description	   =	"I am running in my undies for Stand Up To Cancer as part of my university's Undie Run. Please sponsor me today and we will beat cancer sooner. Any donations, big or small, welcome. #UndieRun. ";
    	var share_image	   =	'<?php  global $wpjg_generalSettings; echo (!jg_check_missing_http($wpjg_generalSettings['imageurl'])) ? get_home_url() : ''; ?><?php echo $this->_tpl_vars['settings']['imageurl']; ?>
';
    	var share_url	   =	'<?php  echo get_home_url('/')  ?>';	
        var share_capt     =    'Stand Up To Cancer';
        FB.ui({
            method: 'feed',
            name: product_name,
            link: share_url,
            picture: share_image,
            caption: share_capt,
            description: description
        }, function(response) {
            if(response && response.post_id){}
            else{}
        });
    }
    </script>
    <?php endif; ?>
    <div class="spread-social">                        
        <nav>
            <ul>
                <li class="twitter_box">
                    <a data-provider="twitter"  rel="nofollow" title="Share on Twitter" href="http://twitter.com/share?url=<?php echo $this->_tpl_vars['user']['pageurl']; ?>
&amp;text=<?php  echo urlencode("I'm running in my undies for #StandUpToCancer. Please sponsor me today - we will beat cancer sooner. @StandUp2C  #UndieRun"); ?>">
                        <img src="<?php echo $this->_tpl_vars['templateurl']; ?>
/images/layout/social_box.png" alt="Twitter">
                    </a>
                </li>
                <li class="fb_box">
                    <a data-provider="facebook"  rel="nofollow" title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['user']['pageurl']; ?>
" <?php if ($this->_tpl_vars['settings']['fbappid'] != ''): ?>onclick="FBShareOp(); return false;"<?php endif; ?>>   
                        <img src="<?php echo $this->_tpl_vars['templateurl']; ?>
/images/layout/social_box.png" alt="Facebook">
                    </a>
                </li>
                <li class="web_box">
                    <?php 
                        $user = $this->get_template_vars('user');
                        $link = $user['pageurl'];
                        $subj = "It's what's undie-neath that counts.";
                        $body = "I'll keep it brief. I'm stripping down to my smalls to Stand Up To Cancer, and I want you to join the fight against cancer and support me.\nUndie Run is taking place at my university, and I am hoping to raise as much money as possible to beat cancer sooner. Please visit my JustGiving page and donate whatever you can. Because when it comes to fighting cancer, it's what's undie-neath that counts\nWe will beat cancer sooner. Please donate today. {$link}.";                        
                        
                        
                        $subj = str_replace(" ", "%20", $subj);
                        $body = str_replace(array("\n", "\r"), '%0D%0A%0D%0A', str_replace(" ", "%20",$body));
                     ?>
                    <a data-provider="email" href="mailto: ?subject=<?php  echo $subj; ?>&body=<?php  echo $body; ?>" rel="nofollow">    
                        <img src="<?php echo $this->_tpl_vars['templateurl']; ?>
/images/layout/social_box.png" alt="@">
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="thanksUnderline"></div>
    <?php if ($this->_tpl_vars['team']['teamtwpage'] != '' || $this->_tpl_vars['team']['teamfbpage'] != ''): ?>
    <p>Follow your team and meet your fellow Undie Runners</p>
    <div style="clear: both;"></div>
    <div class="follow_us">
        <ul>
            <?php if ($this->_tpl_vars['team']['teamtwpage'] != ''): ?>
            <li class="followTwit">
                <a href="<?php echo $this->_tpl_vars['team']['teamtwpage']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['templateurl']; ?>
/images/layout/follow_twit.jpg" alt="Follow Us On Twitter" width="100%" />
                </a>
            </li>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['team']['teamfbpage'] != ''): ?>
            <li class="followFb">
                <a href="<?php echo $this->_tpl_vars['team']['teamfbpage']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['templateurl']; ?>
/images/layout/follow_fb.jpg" alt="Like Us On Facebook" width="100%" />
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>    