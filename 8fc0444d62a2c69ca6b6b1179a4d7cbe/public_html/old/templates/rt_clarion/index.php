<?php
/**
 * @package    Clarion Template - RocketTheme
 * @version    1.0 February 1, 2012
 * @author     RocketTheme http://www.rockettheme.com
 * @copyright  Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

// load and inititialize gantry class
require_once('lib/gantry/gantry.php');
  
JHTML::_('behavior.modal');

$gantry->init();

function isBrowserCapable(){
  global $gantry;
  
  $browser = $gantry->browser;
  
  // ie.
  if ($browser->name == 'ie' && $browser->version < 8) return false;
  
  return true;
}
// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
  <meta name="cmsmagazine" content="3c43b2f1650c24264c4a275e20d28fbc" />
  <meta http-equiv="Cache-Control" content="no-cache" />
  <?php 
    $gantry->displayHead();
    $gantry->addStyles(array('template.css?1','joomla.css'));
    
    if ($gantry->browser->platform != 'iphone')
      $gantry->addInlineScript('window.addEvent("domready", function(){ new SmoothScroll(); });');
      
    if ($gantry->get('loadtransition') && isBrowserCapable()){
      $gantry->addScript('load-transition.js');
      $hidden = ' class="rt-hidden"';
    } else {
      $hidden = '';
    }
    
  ?>
  <script src="/templates/rt_clarion/js/modernizr.min.js"></script>
  <meta name='wmail-verification' content='d310e65ac0cb8d29' />
  <meta name='yandex-verification' content='425ded3bcb690d44' />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56907926-1', 'auto');
  ga('send', 'pageview');
          
  </script>
  <?
  header("Cache-control: no-cache"); 
  header("Pragma: no-cache");
  ?>
</head>
  <body  itemscope="" itemtype="http://schema.org/WebPage" <?php echo $gantry->displayBodyTag(); ?>>
    <?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
    <div id="rt-drawer">
      <div class="rt-container">
        <?php echo $gantry->displayModules('drawer','standard','standard'); ?>
        <div class="clear"></div>
      </div>
    </div>
    <?php /** End Drawer **/ endif; ?>
    <div class="rt-container">
      <div id="rt-container-bg">
        <div id="rt-container-bg2">
          <?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
          <div id="rt-top">
            <div id="rt-top2">
              <?php echo $gantry->displayModules('top','standard','standard'); ?>
              <div class="clear"></div>
            </div>
          </div>
          <?php /** End Top **/ endif; ?>
          <?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
          <div id="rt-header">
            <div class="rt-container">
              <?php echo $gantry->displayModules('header','standard','standard'); ?>
              <div class="clear"></div>
            </div>
          </div>
          <?php /** End Header **/ endif; ?>
          <?php /** Begin Navigation **/ if ($gantry->countModules('navigation')) : ?>
          <div id="rt-navigation">
            <div class="rt-container">
              <?php echo $gantry->displayModules('navigation','standard','standard'); ?>
              <div class="clear"></div>
            </div>
          </div>
          <?php /** End Navigation **/ endif; ?>
          <?php /** Begin Sub Navigation **/ if ($gantry->countModules('subnavigation')) : ?>
          <div id="rt-subnavigation">
            <div class="rt-container">
              <?php echo $gantry->displayModules('subnavigation','standard','menu'); ?>
              <div class="clear"></div>
            </div>
          </div>
          <?php /** End Sub Navigation **/ endif; ?>
          <div id="rt-transition"<?php echo $hidden; ?>>
            <div id="rt-main-container">
              <?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
              <div id="rt-showcase">
                <div class="rt-container">
                  <?php echo $gantry->displayModules('showcase','standard','standard'); ?>
                  <div class="clear"></div>
                </div>
              </div>
              <?php /** End Showcase **/ endif; ?>
              <?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
              <div id="rt-feature">
                <div class="rt-container">
                  <?php echo $gantry->displayModules('feature','standard','standard'); ?>
                  <div class="clear"></div>
                </div>
              </div>
              <?php /** End Feature **/ endif; ?>
              <div id="rt-body-surround">
                <div class="rt-container">
                  <?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
                  <div id="rt-utility"><div id="rt-utility2">
                    <?php echo $gantry->displayModules('utility','standard','standard'); ?>
                    <div class="clear"></div>
                  </div></div>
                  <?php /** End Utility **/ endif; ?>
                  <?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
                  <div id="rt-maintop"><div id="rt-maintop2">
                    <?php echo $gantry->displayModules('maintop','standard','standard'); ?>
                    <div class="clear"></div>
                  </div></div>
                  <?php /** End Main Top **/ endif; ?>
                  <?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
                  <div id="rt-breadcrumbs"><div id="rt-breadcrumbs2">
                    <?php echo $gantry->displayModules('breadcrumb','basic','breadcrumbs'); ?>
                    <div class="clear"></div>
                  </div></div>
                  <?php /** End Breadcrumbs **/ endif; ?>
                  <?php /** Begin Main Body **/ ?>
                    <?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
                  <?php /** End Main Body **/ ?>
                  <?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
                  <div id="rt-mainbottom"><div id="rt-mainbottom2">
                    <?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
                    <div class="clear"></div>
                  </div></div>
                  <?php /** End Main Bottom **/ endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><?php $TemplateName = ViewTemplateName(); ?>
    <?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer')) : ?>
    <div id="rt-footer-surround">
      <div class="rt-container">
        <?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
        <div id="rt-bottom">
          <?php echo $gantry->displayModules('bottom','standard','standard'); ?>
          <div class="clear"></div>
        </div>
        <?php /** End Bottom **/ endif; ?>
        <?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
        <div id="rt-footer">
          <?php echo $gantry->displayModules('footer','standard','standard'); ?>
          <div class="clear"></div>
        </div>
        <?php /** End Footer **/ endif; ?>
      </div>
    </div>
    <?php /** End Footer Section **/ endif; ?>
    <?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
    <div id="rt-copyright">
      <div class="rt-container">
<p align="center"><a href="/buhgalterskie-uslugi">Бухгалтерские услуги</a> | <a href="/yuridicheskiye-uslugi">Юридические услуги</a> | <a href="/price">Стоимость</a> | <a href="/statyi">Статьи</a> | <a href="/kontakty">Контакты</a></p>
<table align="center">
<tr>
<td>
<div class="footer" itemscope="" itemtype="http://schema.org/WPFooter">
 <span itemprop="copyrightYear">2015</span> ©<span itemprop="copyrightHolder">Агентство АЙ ЭДВАЙС</span>. Все права защищены.
 <div class="contact_info">
Москва: +7 495 796-65-09, +7 499 195-99-42<br>
Санкт-Петербург: +7 953 156-69-96 (Регистрация предприятий)<br>
Режим работы: с 9.00 до 21.00 без выходных<br>
 </div>
 <div class="vcard" style="display: none;">
  <span class="tel">+7 495 796-65-09, +7 499 195-99-42</span>
  <span class="email">info@ag-a.ru</span>
  <span class="url">http://www.ag-a.ru/</span>
  <div class="adr">
   <span class="street-address">г. Москва</span></div>
   <span class="fn org">Агентство АЙ ЭДВАЙС</span>
  </div>
 </div>
</div>
</td>
<td style="padding-left:50px"><noindex><a href="https://plus.google.com/116664016993145101250/about"><img src="/images/gl.png"></a> 
<a href="https://www.facebook.com/pages/АЙ-Эдвайс/1499654026976915?sk=timeline&ref=page_internal"><img src="/images/fb.png"></a> 
<a href="https://vk.com/agaru"><img src="/images/vk.png"></a></noindex>
</td>
</tr>
</table>

    
<noindex>
<!--    <!-- Yandex.Metrika informer
<a href="http://metrika.yandex.ru/stat/?id=24104788&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/24104788/3_0_20B5D6FF_0095B6FF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:24104788,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter24104788 = new Ya.Metrika({id:24104788,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/24104788" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</noindex>

        <?php echo $gantry->displayModules('copyright','standard','standard'); ?>
        <div class="clear"></div>
      </div>
    </div>
    <?php /** End Copyright **/ endif; ?>
    <?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
    <div id="rt-debug">
      <div class="rt-container">
        <?php echo $gantry->displayModules('debug','standard','standard'); ?>
        <div class="clear"></div>
      </div>
    </div>
    <?php /** End Debug **/ endif; ?>
    <?php /** Begin Popups **/ 
    echo $gantry->displayModules('popup','popup','popup');
    echo $gantry->displayModules('login','login','popup'); 
    /** End Popup s**/ ?>
    <?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
    <?php echo $gantry->displayModules('analytics','basic','basic'); ?>
    <?php /** End Analytics **/ endif; ?>
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
      (function(){ var widget_id = 'svMwJriiS3';
                   var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
    <!-- {/literal} END JIVOSITE CODE -->
  </body>
</html>
<?php
$gantry->finalize();

?>