<?php
include 'contactformprocess.php';
?>
<html class="contact-page">
<head>
  <title></title>
    <script src="contactformvalidation.js"></script>
  <script>
    required.add('First_Name','NOT_EMPTY','First Name');
    required.add('Last_Name','NOT_EMPTY','Last Name');
    required.add('Email_Address','EMAIL','Email Address');
    // required.add('Subject','NOT_EMPTY','Subject');
    required.add('Message','NOT_EMPTY','Message');
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/yan.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/variables.css">
</head>
<body class="contact-us">

<header>

  <!-- Select images in "/css/contact.css" -->
  <div id="header-image" class="slide-ham">

  </div>

  <div id="image-two" class="slide-ham">

  </div>

  <div id="image-three" class="slide-ham">

  </div>

  <div id="image-four" class="slide-ham">

  </div>

</header>

<section id="menu">
  <div id="mobile-menu" class="hide">
    <ul>

    </ul>
  </div>
</section>

    <main class="width-medium center section">
      <form name="freecontactform" method="post" action=<php process_my_mail()?> onsubmit="return validate.check(this)">
        <table class="center">
          <tr>
            <td class="field-label" valign="top">
              <label for="First_Name">First Name <span class="required">*</span></label>
            </td>
            <td class="field-input" valign="top">
              <input  id="First_Name" type="text" name="First_Name">
            </td>
          </tr>

          <tr>
            <td class="field-label" valign="top">
              <label for="Last_Name">Last Name <span class="required">*</span></label>
            </td>
            <td class="field-input" valign="top">
              <input  id="Last_Name" type="text" name="Last_Name" size="30">
            </td>
          </tr>
          <tr>
            <td class="field-label" valign="top">
              <label for="Email_Address">Email Address <span class="required">*</span></label>
            </td>
            <td class="field-input" valign="top">
              <input  id="Email_Address" type="text" name="Email_Address" maxlength="80" size="30">
            </td>
          </tr>
          <tr>
            <td class="field-label" valign="top">
              <label for="Telephone_Number">Telephone Number</label>
            </td>
            <td class="field-input" valign="top">
              <input  id="Telephone_Number" type="text" name="Telephone_Number" maxlength="30" size="30">
            </td>
          </tr>
          <tr class="comment-row">
            <td class="field-label" valign="top">
              <label for="Message">Comments <span class="required">*</span></label>
            </td>
            <td class="field-input" valign="top">
              <textarea  id="Message" name="Message" maxlength="1000" cols="25" rows="6"></textarea>
            </td>
          </tr>
          <tr>
              <div class="antispammessage">
                  To help prevent automated spam, please DO NOT answer this question
                  <br /><br />
                <span class="antispammessage">Leave this empty: <input type="text" name="url" /></span>
              </div>
          </tr>

          <tr>
            <td>
              <div class="buttons ">
                <input id="submit-button" type="submit" value="Email Form"></div>
            </td>
          </tr>
        </table>
      </form>
    </main>

<footer>
  <!-- You can align the text in the footer using "left", "right", or "center" -->
  <section class="center width-wide right">
    <p>Copyright 2018 - Yan's Place * Minnesota</p>
  </section>
</footer>
<script type="text/javascript" src="js/yans.js"></script>

</body>
</html>