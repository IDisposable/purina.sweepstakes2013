<?php   
  require_once("php-sdk/facebook.php");
  $config = array();
  $config['appId'] = '278073575656912';
  $config['secret'] = 'db2ad87ffbdc644ff13b4e815045a883';
  $config['fileUpload'] = false; // tells the SDK whether or not file uploads are enabled on your server
  $facebook = new Facebook($config);

  $signed_request = $facebook->getSignedRequest();
  $page_id = $signed_request["page"]["id"];
  $page_admin = $signed_request["page"]["admin"];
  $like_status = $signed_request["page"]["liked"];
  $country = $signed_request["user"]["country"];
  $locale = $signed_request["user"]["locale"];
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions') );

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Nestl&eacute; Purina Sweepstakes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/screen.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  
  <body>
    
 <!-- PREPARE THE FACEBOOK JAVASCRIPT SDK -->   
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId                : '278073575656912', // App ID from the App Dashboard
          channelUrl           : '//leveragenewagemedia.com/lookingglass/purina/sweepstakes2013/php-sdk/channel.php', // Channel File for x-domain communication
          status               : true, // check the login status upon init?
          cookie               : true, // set sessions cookies to allow your server to access the session?
          frictionlessRequests : true, // enable frictionless requests for dialogues
          xfbml                : true  // parse XFBML tags on this page?
        });

        // Additional initialization code such as adding Event Listeners goes here
        FB.Canvas.setAutoGrow();

      };

      // Load the SDK's source Asynchronously
      // Note that the debug version is being actively developed and might 
      // contain some type checks that are overly strict. 
      // Please report such bugs using the bugs tool.
      (function(d, debug){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
         ref.parentNode.insertBefore(js, ref);
       }(document, /*debug*/ false));
    </script>

<!-- PROMPT OLD USERS TO UPDATE -->
    <!--[if lt IE 7]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <div id="wrap">
<!-- HEADER -->
      <header>
        <h1>Nestl&eacute; Purina Sweepstakes</h1>
        <h2>Current Students: Enter Now for the chance to win $1500.</h2>
        <p><a href="http://nestlepurinacareers.com" target="_blank">Visit us now at nestlepurinacareers.com</a></p>
      </header>

<!-- MAIN -->
      <div id="main">
      
<?php if (isset($_COOKIE['signed_up'])) : ?>

        <div class="signed-up">
          <h4>You've already signed up!</h4>
          <p>Remember to share this page and earn additional entries.</p>
        </div><!-- signed up -->
        <div class="share">
          <h4>Each time someone uses your link to enter, you get another entry to win!</h4>
          <p class="share-button" onclick="invitebox.show()">Share!</p>
          <script id="invitebox-script" type="text/javascript">(function() {    var ib = document.createElement('script');    ib.type = 'text/javascript';    ib.async = true;    ib.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'invitebox.com/invitation-camp/2005/invitebox.js?key=7c049eca8e50abdad0c9c416f641fd69&jquery='+(typeof(jQuery)=='undefined');    var s = document.getElementsByTagName('script')[0];    s.parentNode.insertBefore(ib, s);})();</script><a id="invitebox-href" href="http://invitebox.com/widget/2005/share">Refer a friend</a>
        </div><!-- share -->
      
<?php elseif ($like_status) : ?>

        <div class="contest-details">
          <h3>Current Students Sign Up Anytime From February 5 - August 6, 2013</h3>
          <h4>Be Entered for a chance to win a <strong>cash prize</strong> of $1,500!</h4>
          <p>The first drawing will take place on April 30, 2013 and a second will take place on August 6, 2013, to give you twice the chances of winning!</p>
        </div><!-- contest details -->
        <div class="three-steps-to-win">
          <p class="enter">1. Enter to Win</p>
          <p class="share">2. Share This App</p>
          <p class="earn">3. Earn Additional Entries</p>
        </div><!-- three steps -->
        <?php include('inc/form.php'); ?>
        
<?php else : ?>

    <div class="notLikedContent">
      <div class="fb-like" data-href="https://www.facebook.com/NestlePurinaCareers" data-send="false" data-layout="box_count" data-width="150" data-show-faces="false"></div>
      <p>'Like' us for a chance to enter to win $1500!<br /><em style="color: #999;">(you may have to refresh the page)</em></p>
    </div> 
        
<?php endif; ?>
      </div><!-- main -->

<!-- FOOTER -->
      <footer>
<?php if (isset($_COOKIE['signed_up'])) : ?>
        <p class="apply"><a class="newwindow" target="_blank" href="http://nestlepurinacareers.com/apply/">Interested in a job with us? Apply Here</a></p>
        <p class="alerts"><a class="newwindow" target="_blank" href="http://m.nestlejobs.com/talentchannel">Get notified of new job postings! Email Alerts</a></p>
        <p class="rules"><a href="rules/" target="_blank">Sweepstakes Rules</a></p>
<?php endif; ?>
        <div class="rules">
          <p><em>Swepstakes Rules</em></p>
          <p><strong>NO PURCHASE OR PAYMENT OF ANY KIND NECESSARY TO ENTER OR WIN.</strong> Sweepstakes begins at 9:00:00 am CT on February 12, 2013 and ends at 8:59:59 a.m. CT on August 6, 2013. Open to legal residents of the 50 United States and D.C. who are 18 years of age or older (19 years of age in AL or NE), at the time of entry and who are enrolled (at the time of entry) as an undergraduate or graduate student at any accredited college or university in the U.S. To enter and for complete Official Sweepstakes Rules go to: <a href="www.facebook.com/NestlePurinaCareers">www.facebook.com/NestlePurinaCareers</a>.  Sponsored by Nestl&eacute; Purina PetCare Company, Checkerboard Square, St. Louis, MO  63164. Administrator: Promotion Fulfillment Center, 311 21st Street, Camanche, IA 52730.</p>
          <p>APPLICATION:</p>
          <p><strong>NO PURCHASE OR PAYMENT OF ANY KIND NECESSARY TO ENTER OR WIN.</strong> Sweepstakes begins at 9:00:00 am CT on February 12, 2013 and ends at 8:59:59 a.m. CT on August 6, 2013. Open to legal residents of the 50 United States and D.C. who are 18 years of age or older (19 years of age in AL or NE), at the time of entry and who are enrolled (at the time of entry) as an undergraduate or graduate student at any accredited college or university in the U.S. Click here for Official Rules.  Sponsored by Nestl&eacute; Purina PetCare Company, Checkerboard Square, St. Louis, MO  63164. Administrator: Promotion Fulfillment Center, 311 21st Street, Camanche, IA 52730.</p>
        </div><!-- rules -->
      </footer>
    </div><!-- wrap -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
