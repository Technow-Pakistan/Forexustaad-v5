<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LfoWyEaAAAAAC-Bs8wiRSMTBSLB3AR8Nq8eS3kH'
        });
      };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div id="html_element"></div>
      <br>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>