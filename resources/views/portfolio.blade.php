<!doctype html>
<html lang="en">
<head>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portfolio</title>
      <link href="{{ URL::asset('template/frontend/css/style.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700%7CRoboto:400,500,700%7CRoboto+Condensed%7CLato:400,700" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('template/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('template/frontend/css_new/cubeportfolio.min.css') }}">
    <link href="{{ URL::asset('template/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>

  <div class="top-header">
      <nav class="navbar navbar-default navbar-static-top first_menu">
          <div class="container">
              <div class="col-lg-7 col-md-8 pull-right top-menu">
                  <div class="col-md-8">
                      <ul class="first_top_menu">
                          <li><a href="tel:+1 978 455 4515" title="Phone"><i class="fa fa-phone-square" aria-hidden="true"></i> +1 978 455 4515</a></li>
                          <li><a href="mailto:info@cmsminds.com" title="Email"><i class="fa fa-envelope" aria-hidden="true"></i> info@cmsminds.com</a></li>
                          <li><a href="skype:laddhar" title="Skype"><i class="fa fa-skype" aria-hidden="true"></i> laddhar</a></li>
                          <div class="clearfix">
                          </div>
                      </ul>
                  </div>
                  <div class="col-md-4">
                      <ul class="second_top_menu second_top_menu pull-right">
                          <!--li id="menu-item-990" class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-990"><a title="Contact" href="#">Contact</a></li-->
                          <li id="menu-item-312" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312"><a title="Career" href="http://www.cmsminds.com/about-us/career/">Career</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </nav>
  </div>
  <div class="top-bottom">
      <div class="wsmenucontainer clearfix">
          <div class="wsmenucontent overlapblackbg">
          </div>
          <!--div class="wsmenuexpandermain slideRight">
              <a class="animated-arrow slideLeft menuclose" id="navToggle"><span></span></a>
          </div-->
          <div class="wrapper clearfix bigmegamenu">
              <div class="logo clearfix">
                  <a href="http://www.cmsminds.com/" title="Web Design and Development Company – cmsMinds">
            <img src="http://www.cmsminds.com/wp-content/uploads/2015/12/logo.png" alt="cmsminds">
          </a>
              </div>
              <!--nav class="wsmenu slideLeft clearfix"-->
               <nav class="wsmenu clearfix">
                  <ul id="menu-main-menu" class="mobile-sub wsmenu-list">
                      <li id="menu-item-143" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-17 current_page_item menu-item-143"><a title="Home" href="http://www.cmsminds.com/">Home</a></li>
                      <li id="menu-item-1739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1739"><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="http://www.cmsminds.com/services/">Services</a></li>
                      <li id="menu-item-157" class="techno menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-157"><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a title="Technologies" href="http://www.cmsminds.com/technologies/">Technologies</a></li>
                      <li id="menu-item-158" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-158"><a title="Portfolio" href="http://www.cmsminds.com/portfolio/">Portfolio</a></li>
                      <li id="menu-item-1766" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1766"><a href="http://www.cmsminds.com/blog/">Blog</a></li>
                      <li id="menu-item-1762" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1762"><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="http://www.cmsminds.com/about-us/">About Us</a></li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <!-- scrollToTop -->
  <!-- ================ -->

<div class="container" style="max-width: 1200px; width: 97%; margin: 55px auto; min-height: 1000px;">
    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">


      <?php
          if($technology == 'all'){
      ?>
      <div data-filter="*" class="cbp-filter-item-active cbp-filter-item" id="cat">
          All <div class="cbp-filter-counter"></div>
      </div>
      <?php foreach ($categories as $category): ?>
        <div data-filter=".<?php echo strtolower(str_replace(' ', '', $category->category_name)); ?>" class="cbp-filter-item" id="cat">
            {{$category->category_name}} <div class="cbp-filter-counter"></div>
        </div>
      <?php endforeach; ?>

    <?php    }else{ ?>
        <div data-filter=".<?php echo strtolower(str_replace(' ', '', $technology)); ?>" class="cbp-filter-item-active cbp-filter-item" id="cat">
            {{$technology}} <div class="cbp-filter-counter"></div>
        </div>
    <?php } ?>
    </div>

    <div id="js-grid-juicy-projects" class="cbp">

      <?php foreach ($portfolios as $portfolio): ?>
        <div class="cbp-item <?php echo strtolower(str_replace(' ', '', $portfolio->technology)); ?>">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="{{url('portfoliodetail/'.$portfolio->portfolioid)}}" class="cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" class="cbp-lightbox cbp-l-caption-buttonRight">view larger</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">{{$portfolio->title}}</div>
            <div class="cbp-l-grid-projects-desc">{{$portfolio->technology}}</div>
        </div>
      <?php endforeach; ?>
 </div>

    <div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
        
    	</div>
</div>
<!-- footer start (Add "light" class to #footer in order to enable light footer) -->
      <!-- ================ -->
      <section class="footerbg">
          <footer>
              <div class="footer" id="footer">
                  <div class="container">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="col-lg-5 col-sm-5 col-xs-12 top_second_footer">
                                  <h3>Blogs</h3>
                                  <div class="col-xs-12">
                                      <div data-ride="carousel" class="carousel slide ftrclint" id="menCollection">
                                          <div class="carousel-inner">
                                            <div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime">
                                            <span class="cal"></span><div class="timedate">
                                            <small>Jun 15</small><h3 class="year">2017</h3></div></div><div class="col-sm-9 blogttl"><h3><a href="http://www.cmsminds.com/managing-videos-youtube-gallery/" title="Managing Videos on YouTube Gallery">Managing Videos on YouTube Gallery</a></h3><p>As content grows, it’s not only pages and text, it also grows in the number for videos. Many businesses upload the videos on YouTube.</p><div>
                                            <a href="http://www.cmsminds.com/managing-videos-youtube-gallery/"><span class="readmore"></span><span>READ MORE</span></a></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime">
                                            <span class="cal"></span><div class="timedate">
                                            <small>May 16</small><h3 class="year">2017</h3></div></div><div class="col-sm-9 blogttl"><h3><a href="http://www.cmsminds.com/how-to-enable-debug-mode-for-drupal-8/" title="How To Enable debug mode for Drupal 8">How To Enable debug mode for Drupal 8</a></h3><p>Drupal 8 provides the best in-class caching mechanism to the Drupal powered websites. It has simple and easy to use for front end user. But, it can be a cumbersome process for developers during the project development.</p><div>
                                            <a href="http://www.cmsminds.com/how-to-enable-debug-mode-for-drupal-8/"><span class="readmore"></span><span>READ MORE</span></a></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime">
                                            <span class="cal"></span><div class="timedate">
                                            <small>Apr 03</small><h3 class="year">2017</h3></div></div><div class="col-sm-9 blogttl"><h3><a href="http://www.cmsminds.com/how-to-create-first-application-on-acquia-server/" title="How to create first application on Acquia server ?">How to create first application on Acqui...</a></h3><p>Acquia is a software service company co-founded by Dries Buytaert and Jay Batson. It provides enterprise products, services, and technical support for open source platform in Drupal.</p><div>
                                            <a href="http://www.cmsminds.com/how-to-create-first-application-on-acquia-server/"><span class="readmore"></span><span>READ MORE</span></a></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime">
                                            <span class="cal"></span><div class="timedate">
                                            <small>Mar 21</small><h3 class="year">2017</h3></div></div><div class="col-sm-9 blogttl"><h3><a href="http://www.cmsminds.com/improve-performance-with-drupal-8/" title="Improve performance with Drupal 8">Improve performance with Drupal 8</a></h3><p>Drupal8 has been very well received and adopted and being flourishing at a much faster pace then anticipated. Because of such positive response, there are lots of <strong>contrib modules available</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/improve-performance-with-drupal-8/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Mar 15</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/5-important-but-overlooked-php-functions/" title="5 Important, but overlooked PHP Functions">5 Important, but overlooked PHP Function...</a></strong></h3><p><strong>I have been developing applications in PHP for years, but recently I came across upon functions and features that I did not know about.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/5-important-but-overlooked-php-functions/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Mar 03</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/why-migrate-from-drupal-7-to-drupal-8/" title="Why migrate from Drupal 7 to Drupal 8?">Why migrate from Drupal 7 to Drupal 8?</a></strong></h3><p><strong>Before upgrading any software or application, it’s important to have a good business case study. So before discussing why upgrade, let’s understand limitations of Drupal 7’s default installation.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/why-migrate-from-drupal-7-to-drupal-8/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item active"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Mar 01</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/html5-vs-flash/" title="HTML5 vs Flash">HTML5 vs Flash</a></strong></h3><p><strong>HTML5 and Flash are two technologies that are getting measured constantly.HTML5 vs Flash is like comparing oranges and apples. Here we start to compare.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/html5-vs-flash/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Feb 23</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/implement-d3-example-in-drupal-8/" title="Implement D3 Example in Drupal 8">Implement D3 Example in Drupal 8</a></strong></h3><p><strong>Drupal 8 is a new generation of Drupal. It is a digital experience platform that helps to reach your web content far and wide. Drupal helps every website owner to deliver the right content at the right time.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/implement-d3-example-in-drupal-8/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Feb 23</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/how-to-show-statewise-team-members-with-details-in-wordpress/" title="How to Show Statewise Team Members With Details in WordPress?">How to Show Statewise Team Members With ...</a></strong></h3><p><strong>WordPress is by far the leading CMS that powers more 50% of all sites across the web. The whole eco-systems of thousands of plug-ins, availability of resources and ease of use for technical/non-technical users have made it popular content management system.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/how-to-show-statewise-team-members-with-details-in-wordpress/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Feb 17</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/10-helpful-tips-for-novice-php-developers/" title="10 helpful tips for Novice PHP developers">10 helpful tips for Novice PHP developer...</a></strong></h3><p><strong>Learning from my experience, on how I got into PHP development, I wanted to share some ideas of what has helped me master PHP. Hope these tips help some Novice PHP developers which can be also termed as best practices during the time of programming.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/10-helpful-tips-for-novice-php-developers/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Feb 16</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/backup-solution-for-drupal-8/" title="Backup Solution for Drupal 8">Backup Solution for Drupal 8</a></strong></h3><p><strong>For any system admin or a manager a paramount important is subject &ndash; BACKUP. There are lots of contrib module available for exporting the Drupal database in Drupal 7. As of this writing, there are not many options or a good contrib module available in Drupal 8.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/backup-solution-for-drupal-8/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Jan 10</small><h3 class="year">2017</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/drupal-research-days/" title="Drupal Research Days">Drupal Research Days</a></strong></h3><p><strong>At cmsMinds, we have a fun and strong work ethic culture. For Drupal team, one of our favourite team events is DRD (Drupal Research Days), generally a 2 day long monthly event where we are free to gallop our wild and creative brains like horse and graze over the internet to explore and discover new things on Drupal.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/drupal-research-days/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Sep 19</small><h3 class="year">2016</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/wordpress-developers-experience-learning-drupal-development/" title="Wordpress Developer's experience learning Drupal Development!!">Wordpress Developer's experience learnin...</a></strong></h3><p><strong>By background I am a WordPress developer, however, one of my senior advised me to look at Drupal. I had the notion that Drupal isn’t user friendly and technically hard to manage. I started reading online and reading others experience of I was convinced that I should try.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/wordpress-developers-experience-learning-drupal-development/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Apr 25</small><h3 class="year">2016</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/how-to-build-single-page-website-in-drupal/" title="How to Build single page website in Drupal">How to Build single page website in Drup...</a></strong></h3><p><strong>Drupal being one of the world’s most trusted content management systems, still when it comes to “One Page Site Approach” there aren’t many options for developers to develop a lightweight One Page Site with minimum possible 3 rd party modules.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/how-to-build-single-page-website-in-drupal/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Apr 07</small><h3 class="year">2015</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/drupal-cms-is-perfect-platform-for-education-industry/" title="Drupal Cms Is Perfect Platform For Education Industry">Drupal Cms Is Perfect Platform For Educa...</a></strong></h3><p><strong>Do you know that the majority of the educators around the world publishes websites with Drupal? Whether it is elementary schools, high schools, community colleges or universities, they have adopted Dr</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/drupal-cms-is-perfect-platform-for-education-industry/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Mar 30</small><h3 class="year">2015</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/top-5-latest-content-management-system-cms-trends-you-should-know-about/" title="Top 5 Latest Content Management System (cms) Trends You Should Know About">Top 5 Latest Content Management System (...</a></strong></h3><p><strong>The year 2014 was not bad from a technology point of view, although, a few newfangled developments were revolutionary and a few were sinking ships. However, the world of Content Management Systems (CMSs) is paving its way in towards the rapidly evolving ecosystem.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/top-5-latest-content-management-system-cms-trends-you-should-know-about/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Dec 05</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/interesting-facts-about-wordpress/" title="Interesting Facts About Wordpress">Interesting Facts About Wordpress</a></strong></h3><p><strong>WordPress is most famous, free and open source blogging tool and a content management system (CMS). WordPress is based on php and MySql. WordPress is very popular blogging CMS used all over the world. It was released on May 27, 2003 by Matt Mullenweg , and Mike Little.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/interesting-facts-about-wordpress/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Dec 05</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/common-wordpress-issues/" title="Common Wordpress Issues">Common Wordpress Issues</a></strong></h3><p><strong>If you are encountering a Wordpress error message or white screen then don’t panic below are some basic errors and there solutions you can check it here.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/common-wordpress-issues/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/acquia-drupal-configuration/" title="Acquia Drupal Configuration">Acquia Drupal Configuration</a></strong></h3><p><strong>Installing Acquia Drupal from scratch “Use this information as a guide as you install, migrate, or upgrade to Acquia Drupal, connect your website to the Acquia Network, and get introduced to Acquia's technical support and network services</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/acquia-drupal-configuration/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/how-to-upgrade-wordpress/" title="How to upgrade wordpress">How to upgrade wordpress</a></strong></h3><p><strong>In this article, we are going to discuss about upgradation of a wordpress website. Go through below steps to upgrade your wordpress website.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/how-to-upgrade-wordpress/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/how-to-create-plugin/" title="How to Create Wordpress plugin?">How to Create Wordpress plugin?</a></strong></h3><p><strong>Creating a plugin in any of the wordpress is very important. To customize whole wordress website it's necessary that you are aware about creating plugins in wordpress. Just to come up with this, we ar</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/how-to-create-plugin/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/acquia-cloud/" title="Acquia Cloud">Acquia Cloud</a></strong></h3><p><strong>1.Import your code to acquia cloud
                                            2.After Import to Acquia Cloud</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/acquia-cloud/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/top-10-tips-to-improve-drupal-performance/" title="Top 10 Tips to improve Drupal Performance">Top 10 Tips to improve Drupal Performanc...</a></strong></h3><p><strong>Now a day, performance of any website is the main concern. There are lots of things that a developer can do to increase performance or speed of a Drupal Website.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/top-10-tips-to-improve-drupal-performance/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div><div class="item"><div class="col-xs-12"><div class="col-sm-3 blogtime"><strong>
                                            <span class="cal"></span><div class="timedate">
                                            <small>Aug 12</small><h3 class="year">2014</h3></div></strong></div><div class="col-sm-9 blogttl"><h3><strong><a href="http://www.cmsminds.com/why-use-drupal/" title="Why Use Drupal?">Why Use Drupal?</a></strong></h3><p><strong>As of now, in the era of Information technology there are lots of <strong>Open Source Technologies</strong> and CMSs to develop web applications.</strong></p><div><strong>
                                            <a href="http://www.cmsminds.com/why-use-drupal/"><span class="readmore"></span><span>READ MORE</span></a></strong></div></div></div></div>
                                          </div>
                                          <strong>
                                            <a data-slide="prev" role="button" href="#menCollection" class="left carousel-control test">
    		                                      <span aria-hidden="true" class="slideleft"></span>
    		                                      <span class="sr-only">Previous</span>
    		                                    </a>
                                            <a data-slide="next" role="button" href="#menCollection" class="right carousel-control test">
    		                                      <span aria-hidden="true" class="slideright"></span>
    		                                      <span class="sr-only">Next</span>
    		                                    </a>
                                          </strong>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-sm-4 col-xs-12 dupallogo">
                                <strong>
                                  <a rel="nofollow" href="https://www.drupal.org/cmsminds" target="_blank" title="Drupal"><img src="http://www.cmsminds.com/wp-content/themes/cmsminds/comman-style/images/footer_drupal.png" class="img-responsive center-block drupal-img" alt="drupal"></a>
                                  <div class="socialicons">
                                      <a href="https://www.facebook.com/cmsminds" target="_blank" title="Facebook" class="btn btn-social-icon btn-facebook"> <i class="fa fa-facebook"></i> </a>
                                      <a href="https://twitter.com/cmsminds" title="Twitter" target="_blank" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                      <a href="https://www.linkedin.com/company/cmsminds" class="btn btn-social-icon btn-linkedin" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                      <a href="https://plus.google.com/+Cmsminds" class="btn btn-social-icon btn-google-plus" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                      <a id="href2" class="btn btn-social-icon" target="_blank" href="http://www.2findlocal.com/b/11743474"><img class="anchorImage" alt="cmsminds" src="http://www.cmsminds.com/wp-content/uploads/2016/08/2findlocal.png"></a>
                                  </div>
                                </strong>
                              </div>
                              <div class="col-lg-3 col-sm-4 col-xs-12 top_f‎irst_footer">
                                  <div id="contact-us-today">
                                      <span class="contactus-today-title">Contact Us Today!</span>
                                      <a title="GET A QUOTE" href="http://cmsminds.com"><button
  		class="btn sample btn-sample"  data-toggle="modal" data-target="#getaquote">GET IN TOUCH ></button></a></div>
                                  <div class="clearfix"></div>
                                  <div class="profile_box">
                                      <h6>Highly rated on :</h6>
                                      <div class="profilelinkbox">
                                          <a href="https://www.upwork.com/o/companies/~01f1498bcb77d2fba7" class="imgprofile" target="_blank" title="Upwork">
  		<img
  		src="http://www.cmsminds.com/wp-content/themes/cmsminds/comman-style/images/upwork.png" class="img-responsive" alt="upwork"/>
  		</a>
                                          <a href="http://www.guru.com/freelancers/river-delta-consulting--inc" class="imgprofile guru" target="_blank" title="Guru">
  		<img
  		src="http://www.cmsminds.com/wp-content/themes/cmsminds/comman-style/images/guru.png" class="img-responsive" alt="guru"/>
  		</a>
                                          <div class="clearfix"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="sep_line"></div>
                  <div class="container">
                      <div class="row">
                          <div id="more-link">
                              <div class="button">More Links <i class="fa fa-angle-down up"></i><i class="fa fa-angle-up down"></i></div>
                          </div>
                      </div>
                      <div id="footer-col">
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-3 col-sm-4 col-xs-12 first_footer">
                                      <h3>SERVICES</h3>
                                      <ul>
                                          <li id="menu-item-260" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-260"><a title="Content Management System" href="http://www.cmsminds.com/services/content-management-system/"><i
  		class="fa fa-angle-right"></i>Content Management System</a></li>
                                          <li id="menu-item-261" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-261"><a title="E-Commerce Application" href="http://www.cmsminds.com/services/e-commerce-application/"><i
  		class="fa fa-angle-right"></i>eCommerce Web Development Services</a></li>
                                          <li id="menu-item-262" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-262"><a title="Custom Web Application" href="http://www.cmsminds.com/services/custom-web-application/"><i
  		class="fa fa-angle-right"></i>Custom Web Application Service</a></li>
                                          <li id="menu-item-263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-263"><a title="Hire Dedicated Resources" href="http://www.cmsminds.com/services/hire-dedicated-resources/"><i
  		class="fa fa-angle-right"></i>Hire Dedicated Resources</a></li>
                                          <li id="menu-item-265" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-265"><a title="QA Solutions" href="http://www.cmsminds.com/services/qa-solutions/"><i
  		class="fa fa-angle-right"></i>QA Services</a></li>
                                          <li id="menu-item-991" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-991"><a title="Web Design" href="http://www.cmsminds.com/services/web-design/"><i
  		class="fa fa-angle-right"></i>Web Design Service</a></li>
                                      </ul>
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12 second_footer">
                                      <h3>QUICK LINKS</h3>
                                      <ul>
                                          <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-17 current_page_item menu-item-107"><a title="Home" href="http://www.cmsminds.com/"><i
  		class="fa fa-angle-right"></i>Home</a></li>
                                          <li id="menu-item-300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300"><a title="Services" href="http://www.cmsminds.com/services/"><i
  		class="fa fa-angle-right"></i>Services</a></li>
                                          <li id="menu-item-236" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-236"><a title="Technologies" href="http://www.cmsminds.com/technologies/"><i
  		class="fa fa-angle-right"></i>Technologies</a>
                                              <ul class="sub-menu">
                                                  <li id="menu-item-1431" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1431"><a href="http://www.cmsminds.com/technologies/drupal-development/"><i
  		class="fa fa-angle-right"></i>Drupal Development</a></li>
                                                  <li id="menu-item-1434" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1434"><a href="http://www.cmsminds.com/technologies/magento-development/"><i
  		class="fa fa-angle-right"></i>Magento Development</a></li>
                                                  <li id="menu-item-1432" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1432"><a href="http://www.cmsminds.com/technologies/wordpress-development/"><i
  		class="fa fa-angle-right"></i>WordPress Development</a></li>
                                                  <li id="menu-item-1433" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1433"><a href="http://www.cmsminds.com/technologies/joomla-development/"><i
  		class="fa fa-angle-right"></i>Joomla Development</a></li>
                                                  <li id="menu-item-1435" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1435"><a href="http://www.cmsminds.com/technologies/php-development/"><i
  		class="fa fa-angle-right"></i>PHP Development</a></li>
                                              </ul>
                                          </li>
                                          <li id="menu-item-510" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-510"><a title="Portfolio" href="http://www.cmsminds.com/portfolio/"><i
  		class="fa fa-angle-right"></i>Portfolio</a></li>
                                          <li id="menu-item-350" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-350"><a title="About Us" href="http://www.cmsminds.com/about-us/"><i
  		class="fa fa-angle-right"></i>About Us</a></li>
                                          <li id="menu-item-752" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-752"><a title="Blog" href="http://www.cmsminds.com/blog/"><i
  		class="fa fa-angle-right"></i>Blog</a></li>
                                          <li id="menu-item-753" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-753"><a title="Testimonials" href="http://www.cmsminds.com/about-us/testimonials/"><i
  		class="fa fa-angle-right"></i>Testimonials</a></li>
                                          <li id="menu-item-755" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-755"><a title="Career" href="http://www.cmsminds.com/about-us/career/"><i
  		class="fa fa-angle-right"></i>Career</a></li>
                                          <li id="menu-item-756" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-756"><a href="http://www.cmsminds.com/contact/"><i
  		class="fa fa-angle-right"></i>Contact</a></li>
                                          <li id="menu-item-1200" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1200"><a href="http://www.cmsminds.com/site-map/"><i
  		class="fa fa-angle-right"></i>Site Map</a></li>
                                          <li id="menu-item-1735" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1735"><a href="http://www.cmsminds.com/press-release/"><i
  		class="fa fa-angle-right"></i>Press Release</a></li>
                                          <li id="menu-item-1846" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1846"><a href="http://www.cmsminds.com/events-celebrations/"><i
  		class="fa fa-angle-right"></i>Events &#038; Celebrations</a></li>
                                      </ul>
                                  </div>
                                  <div class="col-md-5 col-sm-4 col-xs-12 third_footer">
                                      <div id="text-3" class="widget widget_text">
                                          <h3>OFFICES</h3>
                                          <div class="textwidget">
                                              <div itemscope itemtype="http://schema.org/Organization">
                                                  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                      <address>
  		<span><b>USA</b></span><div
  		class="clearfix"></div>
  		<span
  		itemprop="streetAddress">1910 Sedwick Rd, Suite 300-D4,<br/><span
  		itemprop="addressLocality">Durham</span><span
  		itemprop="postalCode">&nbsp;NC 27713</span></span><div
  		class="clearfix"></div>
  		<span
  		itemprop="telephone"><a
  		href="tel:+1 978 455 4515">+1 978 455 4515</a></span>
  		</address></div>
                                              </div>
                                              <div itemscope itemtype="http://schema.org/Organization">
                                                  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                      <address>
  		<span><b>India</b></span><div
  		class="clearfix"></div>
  		<span
  		itemprop="streetAddress"> B 3/2, 3rd Floor,  Anoli Complex, 28 Sunrise Park,<br
  		/><span>Vastrapur,   </span><span
  		itemprop="addressLocality"> Ahmedabad</span><span
  		itemprop="postalCode">&nbsp;380054</span></span><div
  		class="clearfix"></div>
  		<span
  		itemprop="email"><a
  		href="mailto:info@cmsminds.com">info@cmsminds.com</a></span><div
  		class="clearfix"></div>
  		<span
  		itemprop="telephone"><a
  		href="tel:+079 4890 7823">079 4890 7823</a></span>
  		</address></div>
                                              </div>
                                              <div class="clearfix"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="footer-bottom">
                  <div class="container">
                      <p class="text-center"> cmsMinds-All rights reserved &copy; 2017.</p>
                  </div>
              </div>
          </footer>
            <div class="scrollToTop"><i class="icon-up-open-big"></i></div>
            <a title="Top of page" class="btn-scroll-to-top" href="#top" style="display: block;">
    <i class="fa fa fa-angle-up fa-fw"></i>
</a>
      </section>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('template/frontend/js_new/jquery.cubeportfolio.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('template/frontend/js_new/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('template/frontend/js/custom.js') }}"></script>
    <script>
    $('a[href=#top]').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.totop a').fadeIn();
        } else {
            $('.totop a').fadeOut();
        }
    });
    </script>
  </body>
</html>
