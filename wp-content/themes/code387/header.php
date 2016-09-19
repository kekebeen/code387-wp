<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package code387
 */

?><!DOCTYPE html>
<html class="overflow-x-hidden" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,500" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="overflow-x-hidden">
<div id="page" class="site">

    <header id="masthead" class="site-header bg-center cover pv5" role="banner">
        <div class="terminal mw7 center ph3 ph2-ns tc br2 pv5 mb5">
           <!-- <h1 class="fw6 f3  f2-ns lh-title mt0 mb3 white">This is a tagline. For x.</h1> -->
           <div class="window shadow-1 br1 tl">
               <div class="bar bg-black-80 br2 br--top ph3">
                   <div class="btn relative br-100 db bg-light-red"></div>
               </div>
               <div class="body white bg-black-70 ph4 f6 f5-ns">
                   <pre>
                       <div class="comment"># Greetings Friend:</div>
                       <div class="prompt"><span class="light-blue">info@code387.ba:~$ </span><span>You need custom CMS ?</span></div>
                       <div class="prompt"><span class="light-blue">info@code387.ba:~$ </span><span>You need mobile app ?</span></div>
                       <div class="prompt"><span class="light-blue">info@code387.ba:~$ </span><span>Let's work together!</span></div>
                       <div class="prompt"><span class="light-blue">info@code387.ba:~$ </span><span>Scroll down for more</span></div>
                       <div class="prompt"><span class="light-blue">info@code387.ba:~$ </span><span class="pulse">_</span></div>
                   </pre>
               </div>
           </div>
        </div><!-- terminal -->
    </header><!-- #masthead -->
    <nav class="db dt-l w-100 border-box pa3 ph5-l shadow-1-ns">
        <a class="db dtc-l v-mid mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l" href="#" title="Home">
            <h1 class="dib w2 h2">code387</h1>
        </a>
        <div class="db dtc-l v-mid w-100 w-75-l tc tr-l">
            <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="#" title="Home">Home</a>
            <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="#" title="How it Works">How it Works</a>
            <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="#" title="Blog">Blog</a>
            <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="#" title="Press">Press</a>
            <a class="link dim dark-gray f6 f5-l dib" href="#" title="Contact">Contact</a>
        </div>
    </nav><!-- main navigation -->

    <div id="content" class="site-content mv5 pv5">
